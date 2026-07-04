from models.usuarioSistema import UsuarioSistema

def view_ler(sistema: UsuarioSistema):
    print("Você escolheu a opção Ler")
    sistema.read()