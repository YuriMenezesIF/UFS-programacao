


def valormio(li):
    s = 1
    maior = li[0]
    while s < len(li):
        if li[s] > maior:
            maior = li[s]
        s += 1
    return maior




li = [1, 5, 3, 8, 2]
maior = valormio(li)
print("O maior valor na lista", li, "é", maior)