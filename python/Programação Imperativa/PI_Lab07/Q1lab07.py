def ocorre(val, lis):
    for i in range(len(lis)):
        if lis[i] == val:
            return i
    return len(lis)







lis = [1, 2, 3, 4, 5]

val = int(input("Digite um valor para verificar se está na lista! "))


posi = ocorre(val, lis)



if posi == len(lis):
    print("O valor", val, "não foi encontrado. Tente novamente")
else:
    print("O valor :", val, "foi encontrado na posição", posi)