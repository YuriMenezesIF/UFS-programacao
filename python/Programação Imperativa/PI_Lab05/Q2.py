
r = int(input("Coloque o numero que vc deseja fatorar: "))


def fatorial(n):
    result = 1
    for i in range(1, n+1):
        result *= i
    return result


fatorial(r)


print(fatorial(r))