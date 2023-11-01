r = int(input("Coloque o número que vc deseja fatorar: "))


def fatorial(n):
    if n == 0:
        return 1
    else:
        return n * fatorial(n-1)


fatorial(r)


print(fatorial(r))