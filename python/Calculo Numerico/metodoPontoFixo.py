import numpy as np



import math



# define a função f(x)

def f(x):



  return np.sin(x)



# define a derivada f'(x)

def df(x):



  return np.cos(x)



# aproximação inicial

x0 = 1



# inicializa as variáveis

x = x0

Nmax = 10 # um número máximo de iterações previne um loop infinito

i = 0



while i <= Nmax    :



  x1 = f(x)   # Método do ponto fixo



  x = x1

  i += 1



  print (i)   # o número da iteração



  print  (x1) # o valor da aproximação em cada iteração