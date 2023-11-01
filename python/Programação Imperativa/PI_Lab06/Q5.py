def inverter_string(string):
    return "".join(reversed(string))

string = input("Digite uma frase para inverter: ")

print(f"A string '{string}' invertida é '{inverter_string(string)}'")