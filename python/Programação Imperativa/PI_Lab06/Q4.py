


def verificar_string_vazia(string):
    return not bool(string)

def testar_verificar_string_vazia():
    assert verificar_string_vazia("") == True
    assert verificar_string_vazia("Não é vazia") == False
    assert verificar_string_vazia(" ") == False

testar_verificar_string_vazia()


string = input("Digite ou não algo (Se não deseja escrever nada, pressione Enter): ")



def void(s):
    if s == "":
        return True
    else:
        return False







#if void(s):
    print("A string é vazia")
#else:
    print("A string não é vazia")