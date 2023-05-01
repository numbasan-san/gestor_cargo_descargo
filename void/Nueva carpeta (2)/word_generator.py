
from docx import *
from docx.shared import *
from docx.enum.text import *

document = Document()

# document.add_heading('${tipo_registro} EQUIPOS LECTRÓNICOS', 0)

'''
p = document.add_paragraph('El contenido de los párrafos se añadir en varias líneas. ').add_run()
font = p.font
font.name = 'Times New Roman'
font.size = Pt(12)
'''
doc = Document()
run = doc.add_paragraph('dsjf').add_run()
font = run.font
font.name = 'Times New Roman'
font.size = Pt(20)
doc.add_page_break()

doc.save('output.docx')
