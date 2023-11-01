import numpy as np



import math



# define a função f(x)

def f(x):

  return x**2-2





# aproximação inicial

x0 = 1

x1 = 2



# inicializa as variáveis

x = x0

y = x1

Nmax = 100 # um número máximo de iterações previne um loop infinito

i = 0



while i <= Nmax:



  x2 = y - (f(y)*(y-x))/(f(y)-f(x))   # Método da secante





  x = x1

  y = x2

  i += 1



  print (i)   # o número da iteração



  print  (x2) # o valor da aproximação em cada iteração