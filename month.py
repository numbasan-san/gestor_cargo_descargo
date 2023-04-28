
import json
import aspose.words as aw
from meses import *
from datetime import datetime
import sys, os

# sys.argv.pop(0)

# nombre fecha tipo_registro tipo_equipo equipos seriales
# nombre = str(sys.argv[0]).replace('_', ' ')
# print(sys.argv)
fecha = (str(sys.argv[1])).split('/')
dia = str(fecha[0])
mes = f'{meses.get_mes(str(fecha[1]))} ({str(fecha[1])})'
año = str(fecha[2])

print(dia)
print(mes)
print(año)
