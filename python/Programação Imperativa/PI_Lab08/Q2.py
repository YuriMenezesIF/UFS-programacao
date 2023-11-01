#    Created on : 15/04/2023, 07:59:23
#    Author     : Yuri

def busca_binaria(lst, elem):
    inicio = 0
    fim = len(lst) - 1
    while inicio <= fim:
        meio = int((inicio + fim)/2)
        if elem < lst[meio]:
            fim = meio-1 # ajusta posição final
        elif elem > lst[meio]:
            inicio = meio + 1 # ajusta posição inicial
        else:
            return meio # elemento encontrado
    return len(lst)




lst = [11,23,35,44,50,66]
elem=44
pos=busca_binaria(lst,elem)


if pos == len(lst):
    print(f"Nao foi encontrado!")
else:
    print(f"O valor: {elem} foi encontrado na posicao: {pos} da lista")

