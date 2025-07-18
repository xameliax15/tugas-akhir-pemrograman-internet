from docx import Document

doc = Document('Salinan dari project.docx')
for t_idx, table in enumerate(doc.tables):
    print(f'--- Tabel {t_idx} ---')
    for i, row in enumerate(table.rows):
        print(f'Baris {i}: {[cell.text.strip() for cell in row.cells]}') 