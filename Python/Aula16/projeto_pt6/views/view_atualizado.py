from models.usuarioSistema import UsuarioSistema

def view_atualizado(sistema: UsuarioSistema):
    print("Você escolheu a opção Atualizar")
    sistema.update()