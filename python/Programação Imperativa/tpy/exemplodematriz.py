# Pergunta ao utilizador o número de linhas e colunas da matriz
linhas = int(input("Digite o número de linhas da matriz: "))
colunas = int(input("Digite o número de colunas da matriz: "))

# Cria uma matriz vazia
matriz = []

# Preenche a matriz com o input do usuário
for i in range(linhas):
    linha = []
    for j in range(colunas):
        elemento = int(input(f"Digite o elemento ({i}, {j}): "))
        linha.append(elemento)
    matriz.append(linha)

# Mostra a matriz na tela
for linha in matriz:
    print(linha)