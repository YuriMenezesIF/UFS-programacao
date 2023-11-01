import math
print("Olá, bem vindo vamos calcular os valores da função de 2 grau:")
print("////////////////////////////////////////////////////////////////")
def bhaskara(a,b,c):
  delta = (b**2) - (4*a*c)
  
  if delta == 0:
    x1 = (((-1)*b) + (math.sqrt(delta)))/(2*a)
    x2 = (((-1)*b) - (math.sqrt(delta)))/(2*a)
    print()
    print("Equação: ",a,".x²",b,".x",c,"= 0")
    print("Delta = 0, (X1 = x2): ",x1)
    
  elif delta > 0:
    x1 = (((-1)*b) + (math.sqrt(delta)))/(2*a)
    x2 = (((-1)*b) - (math.sqrt(delta)))/(2*a)
    print()
    print("Equação: ",a,".x²",b,".x",c,"= 0")
    print("Delta > 0, raízes: x1:",x1," e x2:",x2)
  else:
    print()
    print("Equação: ",a,".x²",b,".x",c,"= 0")
    print("Delta < 0, não há raízes reais!")


a = float(input("Digite o valor de a: "))
b = float(input("Digite o valor de b: "))
c = float(input("Digite o valor de c: "))
bhaskara(a,b,c)
