usuarios = ["Bruno", "Bozo"]

def create():
    novo_usuario = input("Digite o nome do novo usuário: ")
    usuarios.append(novo_usuario)
    print(f"Novo usuário {novo_usuario} cadastrado com sucesso!")

def read():
    print("Usuários cadastrados:")
    for i, usuario in enumerate(usuarios):
        print(f"{i+1}. {usuario}")

def update():
    read()
    indice = int(input("Digite o número do usuário que deseja atualizar: "))

    if 0 <= indice < len(usuarios):
        novo_nome = input(f"Digite o novo nome para {usuarios[indice]}")
        usuarios[indice] = novo_nome
        print(f"Usuário atualizado para {novo_nome} com sucesso!")
    
    else: print("Usuário inválido.")

def delete():
    read()
    indice = int(input("Digite o número do usuário que deseja excluir: ")) - 1

    if 0 <= indice < len(usuarios):
        removido = usuarios.pop(indice)
        print(f"Usuário {removido} removido com sucesso!")
    
    else: print("Usuário inválido.")

def menu():
    opçao = 5
    while opçao != 0:
        print("""
    Escolha uma opção:
    1 - Cadastrar usuário
    2 - Ler usuário
    3 - Atualizar usuário
    4 - Removar usuário
    0 - Sair""")
        
        opçao = int(input("Digite uma opção: "))

        if opçao == 1: create()
        elif opçao == 2: read()
        elif opçao == 3: update()
        elif opçao == 4: delete()
        elif opçao == 0: print("Encerrando o sistema.")
        else: print("Opção inválida. Tente novamente.")

# inicio #
menu()