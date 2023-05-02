
from docx import *
from docx.shared import *
from docx.enum.text import WD_ALIGN_PARAGRAPH
from docx.enum.table import WD_TABLE_ALIGNMENT, WD_ROW_HEIGHT_RULE
from docx.oxml import OxmlElement
from docx.oxml.ns import qn

document = Document()

# document.add_heading('${tipo_registro} EQUIPOS LECTRÓNICOS', 0)
nombre = 'qwerty uiop'
tipo_registro = 'ANEXO 02 - CARGO'
tipo_equipo = 'laptop'
dia = 00
mes = 00
año = 00
equipos = 'mac'
seriales = '12345'

# Título del documento.
doc = Document()
paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.CENTER
font = paragraph.add_run(f'{tipo_registro} EQUIPOS ELECTRÓNICOS').font
font.name = 'Calibri'
font.size = Pt(22)

# Salto de línea.
paragraph = doc.add_paragraph().add_run().add_break()

# Información del documento.
paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.JUSTIFY
font = paragraph.add_run(f'''Quien suscribe, La Sr(a).: {nombre}, Dominicano, mayor de edad, portador de la cédula de identidad y electoral No.: ____________________________________, domiciliado y residente en , ____________________________________ de esta Ciudad de Santo Domingo, por medio del presente documento DECLARO, haberle entregado el/al Sr(a).: ____________________________________, portador de la cédula de identidad y electoral No.: ____________________________________ , quien actúa como representante de la empresa GCS Systems, lo siguiente:
''').font
font.name = 'Calibri'
font.size = Pt(12)

# Salto de línea.
# paragraph = doc.add_paragraph().add_run().add_break()

# Tabla
data = (
    ('EQUIPO', tipo_equipo), 
    ('TIPO DE EQUIPO', tipo_equipo), 
    ('MARCA', equipos), 
    ('SERIAL', seriales), 
    ('NÚMERO TELEFÓNICO', '')
)
table = doc.add_table(rows=1, cols=2, style='Table Grid')
table.alignment = WD_TABLE_ALIGNMENT.CENTER

cll_xml_elm = table.rows[0].cells[0]._tc
tbl_cll_properties = cll_xml_elm.get_or_add_tcPr()
shade_obj = OxmlElement('w:shd')
shade_obj.set(qn('w:fill'), "6EADFF")
tbl_cll_properties.append(shade_obj)
cll_xml_elm = table.rows[0].cells[1]._tc
tbl_cll_properties = cll_xml_elm.get_or_add_tcPr()
shade_obj = OxmlElement('w:shd')
shade_obj.set(qn('w:fill'), "6EADFF")
tbl_cll_properties.append(shade_obj)

table.rows[0].cells[0].text = 'DESCRIPCIÓN'
table.rows[0].cells[1].text = 'DETALLES'
i = 1
for title, content in data:
    row_cells = table.add_row().cells

    cll_xml_elm = table.rows[i].cells[0]._tc
    tbl_cll_properties = cll_xml_elm.get_or_add_tcPr()
    shade_obj = OxmlElement('w:shd')
    shade_obj.set(qn('w:fill'), "CCD9FF")
    tbl_cll_properties.append(shade_obj)

    row_cells[0].text = title
    row_cells[1].text = str(content)
    
    i += 1


paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.JUSTIFY
font = paragraph.add_run(f'''
Propiedad de la empresa GCS Systems LTD, los suscritos en el presente Recibo de Descargo, firman al pie del presente documento, en señal de aprobación de este.''').font
font.name = 'Calibri'
font.size = Pt(12)

paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.JUSTIFY
font = paragraph.add_run(f'''Al firmar este documento me comprometo a cumplir con los lineamientos establecidos en la POLÍTICA SERVICIOS TECNOLÓGICOS RCS-SEG-03-PL; así como con todas las políticas de Seguridad de la información y ciberseguridad de GCS Systems con sus procesos internos establecidos y divulgados.''').font
font.name = 'Calibri'
font.size = Pt(12)

paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.JUSTIFY
font = paragraph.add_run(f'''Hecho en dos (2) originales, una para cada parte firmante, en la Ciudad de Santo Domingo, Distrito Nacional, Capital de la Republica dominicana, a los {dia} días del mes de {mes} del año {año}.''').font
font.name = 'Calibri'
font.size = Pt(12)

paragraph = doc.add_paragraph()
paragraph.alignment = WD_ALIGN_PARAGRAPH.CENTER
text = paragraph.add_run(f'''_________________________________ _________________________________
Nombre y Firma			Nombre y Firma
    DECLARANTE		             REPRESENTANTE
''')
text.bold = True
font = text.font
paragraph.bold = True
paragraph.bold = False
font.name = 'Calibri'
font.size = Pt(12)


doc.save('output.docx')

"""
Lo mejor es declarar el párrafo, su organización, el texto, su fuente y el tamaño de su fuente; 
en ese orden.
"""
