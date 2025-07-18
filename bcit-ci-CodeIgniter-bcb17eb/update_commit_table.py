from docx import Document

doc = Document('Salinan dari project.docx')
table = doc.tables[0]

# Baca commit dari file dengan fallback encoding
try:
    with open('commit_log.txt', encoding='utf-8') as f:
        lines = [line.strip() for line in f if line.strip()]
except UnicodeDecodeError:
    with open('commit_log.txt', encoding='latin-1') as f:
        lines = [line.strip() for line in f if line.strip()]

# Siapkan data commit
commits = []
for i, line in enumerate(lines):
    parts = line.split('|')
    if len(parts) == 3:
        hash_, subject, body = parts
        commits.append((str(i+1), subject, hash_, body if body else '-'))
    elif len(parts) == 2:
        hash_, subject = parts
        commits.append((str(i+1), subject, hash_, '-'))
    else:
        commits.append((str(i+1), line, '-', '-'))

# Temukan baris header tabel commit (berisi 'No', 'Perintah Ke AI', dst)
header_idx = None
for i, row in enumerate(table.rows):
    texts = [cell.text.strip() for cell in row.cells]
    if 'No' in texts and 'Perintah Ke AI' in texts:
        header_idx = i
        break

if header_idx is None:
    raise Exception('Header tabel commit tidak ditemukan!')

# Hapus semua baris setelah header (baris commit lama)
while len(table.rows) > header_idx + 1:
    tbl = table._tbl
    tbl.remove(tbl.tr_lst[header_idx+1])

# Tambahkan baris commit baru
for no, perintah, judul, deskripsi in commits:
    row = table.add_row()
    row.cells[0].text = no
    row.cells[1].text = perintah
    row.cells[2].text = judul
    row.cells[3].text = deskripsi

doc.save('Salinan dari project.docx')
print('Tabel commit berhasil diupdate!') 