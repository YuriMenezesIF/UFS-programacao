def maior(x,y,z):
    if x>y:
        print(x, "é maior que",y)
    elif x<y:
        print(x,"é menor que",y)
    elif x==y:
        print("a diferenca entre os dois valores é",z)
    return(x,y,z);

n1=int(input("escolha o primeiro valor "))
n2=int(input("escolha o segundo valor "))
n3= n1-n2 

n1,n2,n3 = maior(n1,n2,n3)