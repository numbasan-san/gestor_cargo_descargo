
import json

class load_regist:

    def __init__(self, id):
        with open('registros.json', 'r') as f:
            array = json.load(f)
        
            # Le cambio a comillas dobles 
            # formatearjson = json.dumps(array)
        
        for i in array:
            if i['id'] == str(id):
                return i

# print (formatearjson)
