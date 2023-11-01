string = input("Digite uma string para testar: ")

# Usando o laço while
k = 0
while k < len(string):
    print(string[k])
    k += 1

# Usando o laço for
for char in string:
    print(char)