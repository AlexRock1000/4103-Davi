from models.usuarioSistema import UsuarioSistema
from exceptions.usuario_exceptions import *
from views import *

def menu():
    sistema = UsuarioSistema()

    opcao = 0
    while opcao != 6:
        print("\nEscolha uma opção:")
        print("1 - Cadastrar Usuário")
        print("2 - Ler Usuários")
        print("3 - Atualizar Usuário")
        print("4 - Deletar Usuário")
        print("5 - Recuperar Usuário Deletado")
        print("6 - Sair")

        try:
            opcao = int(input("Digite o número da opção desejada: "))
        except ValueError:
            print("Por favor, insira um número válido.")
            continue

        try:
            if opcao == 1:
                view_cadastrar(sistema)
            elif opcao == 2:
                view_ler(sistema)
            elif opcao == 3:
                view_atualizado(sistema)
            elif opcao == 4:
                view_deletar(sistema)
            elif opcao == 5:
                view_recuperar(sistema)
            elif opcao == 6:
                print("Encerrando o sistema.")
            else:
                print("Opção inválida. Tente novamente.")
        except (ArquivoNaoEncontradoException, UsuarioInvalidoException,
                ErroDeDecodificacaoException, EntradaInvalidaException) as e:
            print(f"Erro: {e}")

if __name__ == "__main__":
    menu()

