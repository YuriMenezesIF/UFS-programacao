#    Created on : 15/04/2023, 07:59:23
#    Author     : Yuri

def bolha(lst, n):
    i = 0
    while i < n:
        j = 0
        while j < n - 1:
            if lst[j] > lst[j + 1]:
                lst[j], lst[j + 1] = lst[j + 1], lst[j]
            j += 1
        i += 1
    return lst




lst = [50,66,23,35,44,11]
n = 5
print("Lista Original: ", lst)
print("Lista Ordenada: ", bolha(lst, n))