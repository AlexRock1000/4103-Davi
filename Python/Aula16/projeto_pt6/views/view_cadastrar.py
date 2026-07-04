from models.usuarioSistema import UsuarioSistema

def view_cadastrar(sistema: UsuarioSistema):
    print("Você escolheu a opção Cadastrar")
    novo_usuario = input("Digite o nome do novo usuário: ")
    sistema.create(novo_usuario)