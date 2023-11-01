



def verifiqocorre(v, lista):
    for i in range(len(lista)):
        if lista[i] == v:
            return i
    return len(lista)






lista = [1, 2, 3, 4, 5]
v = int(input("Digite um valor para verificar se está na lista! "))



posicao = verifiqocorre(v, lista)



if posicao == len(lista):
    print("O valor", v, "não foi encontrado na lista.")
else:
    print("O valor", v, "foi encontrado na posição", posicao, "da lista.")