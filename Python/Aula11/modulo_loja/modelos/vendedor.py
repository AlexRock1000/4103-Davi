class Vendedor:
    def __init__(self, nome, id_vendedor):
        self.nome = nome
        self.id_vendedor = id_vendedor

    def exibir_vendedor(self):
        print(f"Vendedor: {self.nome}, ID: {self.id_vendedor}")
