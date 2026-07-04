class UsuarioSistema:
    def __init__(self, usuarios):
        self.usuarios = usuarios

    def create(self):
        novo_usuario = input("Digite o nome do novo usuário: ")
        self.usuarios.append(novo_usuario)
        print(f"Usuário {novo_usuario} cadastrado com sucesso!")

    def read(self):
        print("Usuários cadastrados:")
        for i, usuario in enumerate(self.usuarios, start=1):
            print(f"{i}. {usuario}")

    def update(self):
        self.read() 
        indice = int(input("Digite o número do usuário que deseja atualizar: ")) - 1
        if 0 <= indice < len(self.usuarios):
            novo_nome = input(f"Digite o novo nome para {self.usuarios[indice]}: ")
            self.usuarios[indice] = novo_nome
            print(f"Usuário atualizado para {novo_nome} com sucesso!")
        else:
            print("Usuário inválido.")

    def delete(self):
        self.read()
        indice = int(input("Digite o número do usuário que deseja excluir: ")) - 1
        if 0 <= indice < len(self.usuarios):
            removido = self.usuarios.pop(indice)
            print(f"Usuário {removido} excluído com sucesso!")
        else:
            print("Usuário inválido.")
