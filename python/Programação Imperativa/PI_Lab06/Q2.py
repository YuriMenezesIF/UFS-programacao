

string = input("Digita uma string:  ")
caracter = input("Digite que caracter deseja verificar se está na string: ")




def contcaracter(string, caracter):
    contador = 0
    for char in string:
        if char == caracter:
            contador += 1
    return contador






print(f"A string '{string}' tem {contcaracter(string, caracter)} ocorrências do caracter '{caracter}'")