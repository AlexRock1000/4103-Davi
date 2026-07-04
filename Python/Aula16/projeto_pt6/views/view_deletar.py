from models.usuarioSistema import UsuarioSistema

def view_deletar(sistema: UsuarioSistema):
    print("Você escolheu a opção Deletar")
    sistema.delete()