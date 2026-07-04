class UsuarioSistema:
    usuario = ["Pombala", "Doido"]

    @classmethod
    def create(cls):
        novo_usuario = input("Digite o nome do novo usuário: ")
        cls.usuarios.append(novo_usuario)
        print(f"Novo usuário {novo_usuario} cadastrado com sucesso!")

    @classmethod
    def read(cls):
        print("Usuários cadastrados:")
        for i, usuario in enumerate(cls.usuarios):
            print(f"{i+1}. {usuario}")

    @classmethod
    def update(cls):
        cls.read()
        indice = int(input("Digite o número do usuário que deseja atualizar: ")) - 1

        if 0 <= indice < len(cls.usuarios):
            novo_nome = input(f"Digite o novo nome para {cls.usuarios[indice]}")
            cls.usuarios[indice] = novo_nome
            print(f"Usuário atualizado para {novo_nome} com sucesso!")
        
        else: print("Usuário inválido.")

    @classmethod
    def delete(cls):
        cls.read()
        indice = int(input("Digite o número do usuário que deseja excluir: ")) - 1

        if 0 <= indice < len(cls.usuarios):
            removido = cls.usuarios.pop(indice)
            print(f"Usuário {removido} removido com sucesso!")
        
        else: print("Usuário inválido.")

# FIM  UsuarioSistema #
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

        if opçao == 1: UsuarioSistema.create()
        elif opçao == 2: UsuarioSistema.read()
        elif opçao == 3: UsuarioSistema.update()
        elif opçao == 4: UsuarioSistema.delete()
        elif opçao == 0: print("Encerrando o sistema.")
        else: print("Opção inválida. Tente novamente.")

# Inicio
menu()