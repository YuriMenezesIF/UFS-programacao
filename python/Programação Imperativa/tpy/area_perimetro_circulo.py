import math
#    Created on : 08/02/2023, 19:59:23
#    Author     : Yuri

print("Olá, vamos calcular a área e o perimetro do circulo desejado !:")

def area(r):
    area = (math.pi * pow(r,2)) 
    peri = (2*(math.pi)*r)
    if area < 0:
        print("ERRO: A área do circulo é negativa, tente outro valor!")
    elif peri < 0:
        print("ERRO: O perímetro do circulo é negativo, tente outros valor!")    
    else:
        print("A área do circulo é :",area)
        print("O perímetro do circulo é :",peri)

 
r = float(input("Digite o valor do raio do circulo: "))
area(r)
