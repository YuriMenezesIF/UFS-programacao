

n = int(input("Coloque o numero que equivale ao limite superior: "))


def somaimpar(superior):
    total = 0
    for num in range(1, superior+1, 2):
        total += num
    return total



somaimpar(n)

print(somaimpar(n))
