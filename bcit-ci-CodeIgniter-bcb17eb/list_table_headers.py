from docx import Document

doc = Document('Salinan dari project.docx')
for idx, table in enumerate(doc.tables):
    header = [cell.text.strip() for cell in table.rows[0].cells]
    print(f'Tabel {idx}: {header}') 