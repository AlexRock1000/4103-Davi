class Produto:
    def __init__(self, nome_produto, preco):
        self.nome_produto = nome_produto
        self.preco = preco

    def exibir_produto(self):
        print(f"Produto: {self.nome_produto}, Preço: R$ {self.preco:.2f}")
