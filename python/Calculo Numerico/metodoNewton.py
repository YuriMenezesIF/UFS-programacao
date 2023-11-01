import numpy as np



import math



# define a função f(x)

def f(x):

  return np.sin(x) +np.cos(1+x**2) -1



# define a derivada f'(x)

def df(x):

  return np.cos(x) -np.sin(1+x**2)



# aproximação inicial

x0 = 1.9447021484375



# inicializa as variáveis

x = x0

Nmax = 10 # um número máximo de iterações previne um loop infinito

i = 0



while i <= Nmax:



  x1 = x - f(x)/df(x)   # Método de Newton-Raphson





  x = x1

  i += 1



  print (i)   # o número da iteração



  print  (x1) # o valor da aproximação em cada iteração