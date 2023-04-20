
import json
import aspose.words as aw
from meses import *
from datetime import datetime


def load_json_regist(id):
    with open('data/registros.json', 'r') as f:
        array = json.load(f)
    
        # Le cambio a comillas dobles 
        # formatearjson = json.dumps(array)
    
    for i in array:
        if i['id'] == str(id):
            return i

now = datetime.now()

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
builder.writeln("ANEXO 04 - CARGO EQUIPOS ELECTRÓNICOS")
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

nombre = (load_json_regist(1))['nombre']
equipos = (load_json_regist(1))['equipos']
seriales = (load_json_regist(1))['seriales']

mes = meses()
day = now.day
month = f'''{mes.get_mes(now.strftime('%m'))} ({now.strftime('%m')})''' # .isoformat()
year =  now.year

# Insert paragraph
builder.writeln(f'''Quien suscribe, La Sra.: {nombre}, Dominicano, mayor de edad, portador de la cédula de identidad y electoral No.:				, domiciliado y residente en				, de esta Ciudad de Santo Domingo, por medio del presente documento DECLARO, haber recibido de él/la Sr(a).:		, portador de la cédula de identidad y electoral No.:	, quien actúa como representante de la empresa GCS Systems, lo siguiente:
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
builder.write(f"{equipos}")
builder.end_row()

builder.insert_cell()
builder.write("TIPO DE EQUIPO")
builder.insert_cell()
builder.write(f"{seriales}")
builder.end_row()

builder.insert_cell()
builder.write("MARCA")
builder.insert_cell()
builder.write(f"")
builder.end_row()

builder.insert_cell()
builder.write("SERIAL")
builder.insert_cell()
builder.write(f"")
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
Hecho en dos (2) originales, una para cada parte firmante, en la Ciudad de Santo Domingo, Distrito Nacional, Capital de la República dominicana, a los {day} días del mes de {month} del año {year}.


''')

# Save document
doc.save(f"_$cumento compromiso de politicas Aparatos {nombre}.docx")
print('Done!')
