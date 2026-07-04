from models.usuarioSistema import UsuarioSistema

def view_recuperar(sistema: UsuarioSistema):
    print("Você escolheu a opção Recuperar")
    sistema.recuperar_usuarios_deletados()