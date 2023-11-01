#    Created on : 14/04/2023, 19:59:23
#    Author     : Yuri

def busca_linear(lista,elemento):
    ind=0
    while ind<len(lista):
        if elemento==lista[ind]:
            return ind
        ind=ind+1
    return len(lista)


lista=[50,66,23,35,44,11]
v=50
pos=busca_linear(lista,v)

if pos == len(lista):
    print(f"Nao foi encontrado!")
else:
    print(f"O valor: {v} foi encontrado na posicao: {pos} da lista")
