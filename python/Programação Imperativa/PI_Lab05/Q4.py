
n1=int(input("Digite o primeiro número para ser usado no mdc: "))
n2=int(input("Digite o segundo número para ser usado no mdc: "))

def mdc(a, b):
    if b == 0:
        return a
    else:
        return mdc(b, a % b)
    





mdc(n1,n2)

print(mdc(n1,n2))
