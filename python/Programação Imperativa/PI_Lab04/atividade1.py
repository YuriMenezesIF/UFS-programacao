import math
print()
print("Olá, bem vindo vamos ver se o numero é positivo ou negativo")



# Funcao Positivo
def positivo(a):
  if a > 0:
    return True
    
  


# Funcao Par
def par(a):
  if a%2 == 0:
    return True
  elif a%2 != 0:
    return False
    
  




a = float(input("Digite o valor do numero aqui:"))


if positivo(a) == True:   
  print("O numero :",a,par(a))
elif a < 0:
  print("O número é negativo:",a)  
