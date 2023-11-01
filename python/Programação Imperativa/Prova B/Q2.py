import math


def divisao(x):
    if (x%3==0) & (x%7==0):
        return True
    else:
        return False





x = int(input("Digite o numero que deseja verificar se é divisivel por 3 e 7:  "))


print(divisao(x))



if(divisao(x)==True):
    print("O numero é divisivel por 3 e 7")
else:
    print("O numero não é divisivel por 3 e 7")



