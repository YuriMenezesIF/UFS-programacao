#    Created on : 25/04/2023, 15:20:23
#    Author     : Yuri

import pprint
agenda1 = {
    "Clara": "4947487",
    "Eduardo": "99439849",
    "ISA <3": "29238738",
    "kevin": "9020290",
    "giselle": "948939849",
    "Graziela": "99393993"
}

agenda1["Jorge"]="9292992"

print(len(agenda1))
pprint.pprint(agenda1)

if 'ISA <3' in agenda1:
    print('A chave "Isadora" existe na agenda.')
else:
    print('A chave "Isadora" não existe na agenda.')

del agenda1['Jorge']

print(len(agenda1))
pprint.pprint(agenda1)

for pessoa, telefone in agenda1.items():
    print(pessoa, telefone)

   
agenda2 = {
    'Ana': '12345678', 
    'Bruno': '23456789', 
    'Carla': '34567890', 
    'Daniel': '45678901'
    }

for chave in agenda1:
    agenda1[chave]= agenda2[chave] 

print(agenda1)
print(agenda2)