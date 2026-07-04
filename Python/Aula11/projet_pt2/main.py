from modelos.usuarioSistema import UsuarioSistema

def menu():
    usuarios = ["Pietryk", "Judy"]  
    sistema = UsuarioSistema(usuarios)

    opcao = 0
    while opcao != 5:
        print("\nEscolha uma opção:")
        print("1 - Cadastrar Usuário")
        print("2 - Ler Usuários")
        print("3 - Atualizar Usuário")
        print("4 - Deletar Usuário")
        print("5 - Sair")

        opcao = int(input("Digite o número da opção desejada: "))

        if opcao == 1:
            sistema.create()
        elif opcao == 2:
            sistema.read()
        elif opcao == 3:
            sistema.update()
        elif opcao == 4:
            sistema.delete()
        elif opcao == 5:
            print("Encerrando o sistema.")
        else:
            print("Opção inválida. Tente novamente.")


if __name__ == "__main__":
    menu()
