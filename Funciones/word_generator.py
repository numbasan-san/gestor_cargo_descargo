
import json
import aspose.words as aw
from meses import *
from datetime import datetime
import sys, os

sys.argv.pop(0)

# nombre fecha tipo_registro tipo_equipo equipos seriales
nombre = str(sys.argv[0]).replace('_', ' ')

fecha = (str(sys.argv[1])).split('/')
dia = str(fecha[0])
mes = f'{meses.get_mes(str(fecha[1]))} ({str(fecha[1])})'
año = str(fecha[2])

tipo_registro = str(sys.argv[2]).replace('_', ' ')
tipo_equipos = str(sys.argv[3]).replace('_', ' ')
equipos = str(sys.argv[4]).replace('_', ' ')
seriales = str(sys.argv[5]).replace('_', ' ')

# This code example demonstrates how to create a new Word document using Python.
# Create document object
doc = aw.Document()

# Create a document builder object
builder = aw.DocumentBuilder(doc)

# Specify font formatting Font
font = builder.font
font.size = 22
font.bold = True
font.name = "Calibri"

# Insert text
anexo = '04 - CARGO' if tipo_registro == 'cargo' else '02 - DESCARGO'
builder.writeln(f"ANEXO {anexo} EQUIPOS ELECTRÓNICOS")
builder.writeln()

# Set paragraph formatting
font.size = 11
font.bold = False
font.name = "Calibri"
font.underline = aw.Underline.NONE

paragraphFormat = builder.paragraph_format
paragraphFormat.first_line_indent = 8
paragraphFormat.alignment = aw.ParagraphAlignment.JUSTIFY
paragraphFormat.keep_together = True


# Insert paragraph
builder.writeln(f'''Quien suscribe, La Sra.: {nombre}, Dominicano, mayor de edad, portador de la cédula de identidad y electoral No.:__________________________, domiciliado y residente en __________________________, de esta Ciudad de Santo Domingo, por medio del presente documento DECLARO, haber recibido de él/la Sr(a).:__________________________, portador de la cédula de identidad y electoral No.:__________________________, quien actúa como representante de la empresa GCS Systems, lo siguiente:
''')
builder.writeln()

# Insert a Table

# Start table
table = builder.start_table()

# Insert cell
builder.insert_cell()
table.auto_fit(aw.tables.AutoFitBehavior.AUTO_FIT_TO_CONTENTS)
table.alignment = aw.tables.TableAlignment.CENTER

# Set formatting and add text
builder.cell_format.vertical_alignment = aw.tables.CellVerticalAlignment.CENTER

font.bold = True
builder.cell_format.width = 150
builder.row_format.heading_format = True
builder.write("DESCRIPCIÓN")
builder.insert_cell()
builder.write("DETALLES")
builder.end_row()
font.bold = False

builder.insert_cell()
builder.write("EQUIPO")
builder.insert_cell()
builder.write(f"{tipo_equipos}")
builder.end_row()

builder.insert_cell()
builder.write("TIPO DE EQUIPO")
builder.insert_cell()
builder.write(f"{tipo_equipos}")
builder.end_row()

builder.insert_cell()
builder.write("MARCA")
builder.insert_cell()
builder.write(f"{equipos}")
builder.end_row()

builder.insert_cell()
builder.write("SERIAL")
builder.insert_cell()
builder.write(f"{seriales}")
builder.end_row()

builder.insert_cell()
builder.write("NÚMERO TELEFÓNICO")
builder.insert_cell()
builder.write(f"")
builder.end_row()

# End table
builder.end_table()
builder.writeln()

builder.writeln(f'''Propiedad de la empresa GCS Systems LTD, los suscritos en el presente Recibo de Descargo, firman al pie del presente documento, en señal de aprobación de este.
Al firmar este documento me comprometo a cumplir con los lineamientos establecidos en la POLÍTICA SERVICIOS TECNOLÓGICOS RCS-SEG-03-PL; así como con todas las políticas de Seguridad de la información y ciberseguridad de GCS Systems con sus procesos internos establecidos y divulgados.
Hecho en dos (2) originales, una para cada parte firmante, en la Ciudad de Santo Domingo, Distrito Nacional, Capital de la República dominicana, a los {dia} días del mes de {mes} del año {año}.''')

# Save document
doc.save(f"docs/word/_$cumento compromiso de politicas Aparatos {nombre}.docx")
print('Word: Done!')
"""
"""

