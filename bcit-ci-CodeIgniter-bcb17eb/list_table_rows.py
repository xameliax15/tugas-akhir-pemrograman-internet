from docx import Document

doc = Document('Salinan dari project.docx')
table = doc.tables[0]
for i, row in enumerate(table.rows):
    print(f'Baris {i}: {[cell.text.strip() for cell in row.cells]}') 