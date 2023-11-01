import math

print("Por favor digite sua idade (Não pode mentir):")








#Funcao MaiorDeIdade
def FuncaoMaiorDeIdade(a):
    if a > 18:
        return True
    else:
        return False






a=int(input("Digite sua idade:   "))



if FuncaoMaiorDeIdade(a)== True:
    print("Você é maior de idade:",a)
else:
    print("Você é menor de idade:",a)