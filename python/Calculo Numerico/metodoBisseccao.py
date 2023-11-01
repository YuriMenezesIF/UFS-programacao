import numpy as np 


def f(x):
    y=x**3-7*x**2+14*x-6
    return y    



def bissec(a,b,erro):
    #calculando número de iterações 
    n=(np.log(b-a)- np.log(erro))/np.log(2)
    #funcão ceil pega proximo número inteiro
    n=np.ceil(n)
    i=0
    print("="*40)
    print("Valor das iterações")
    print("="*40)
    while i<n:
        #verificando a condição de Bolzano
        if f(a)*f(b) > 0: 
            print("Não podemos afirmar se há raizes nesse intervalo")
        else:
            # Criar um ponto medio m=a+b/2
            m=(a+b)/2
            m=round(m,6)
            if f(a)*f(m)<0:
                b=m
            else:
                a=m
        print(f'Valor de x_{i+1} = {m}')
        i+=1
    print()
    return print(f'O valor aproximado da raiz é:{m}')

bissec(0,1,0.01)