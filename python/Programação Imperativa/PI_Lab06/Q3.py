s = input("Digita uma frase(string):  ")
c = input("Digite que caracter deseja verificar se está na string: ")




def tem_string(s, c):
    contador = 0
    for ct in s:
        if ct == c:
            return True
    return False


if tem_string(s, c):
    print(f"O caracter aparece na string. Portanto o resultado é: {tem_string(s,c)}")
else:
    print(f"O caracter não aparece na string. Portanto o resultado é: {tem_string(s,c)}")


#O codigo comentado abaixo, seria o resultado mais direto para resolucao do problema! E substituiria o if acima, mas como pensei em um uso de usuario leigo,
#Preferi deescrever em detalhes o processo usando o print para informar o que "True" e "False" representam nesse cenario
#print(tem_string(s, c))