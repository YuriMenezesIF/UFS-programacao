import math
def area(x):
    a = 4*math.pi*x**2
    return a;

def comp(x):
    b = 2*math.pi*x
    return b;

def volume(x):
    c = 3/4*math.pi*x**3
    return c;



while True:
    r = int(input("determine um valor para o raio"))
    if r>0:
        break
    else:
        print("raio invalido")
a = area(r)

print("o valor da area é ",a, "metros quadrados")

b = comp(r) 

print("o valor do comprimento é ",b, "metros")

c = volume(r)

print("o valor do volume da esfera é ",c,"metros cubicos")