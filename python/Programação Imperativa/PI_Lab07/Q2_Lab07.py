def valorm(lista):
    t = 1
    maioral = lista[0]
    while t < len(lista):
        if lista[t] > maioral:
            maioral = lista[t]
        t += 1
    return maioral




lista = [1, 5, 3, 8, 2]
maioral = valorm(lista)
print("O maior valor na lista", lista, "é", maioral)