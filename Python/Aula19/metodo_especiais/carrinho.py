from produto import Produto

class Carrinho:
    def __init__(self):
        """
        Iniciando um novo carrinho de compras vazio.
        """
        self.produtos = []

    def adicionar_produto(self, produto):
        self.produtos.append(produto)

    def __len__(self):
        """
        Retorna quantidade de Produtos para o carrinho.
        """
        return len(self.produtos)
    
    def __str__(self):
        #Concatena a descrição de cada produto
        conteudo = "\n".join(str(produto) for produto in self.produtos)
        return f"Carrinho de Compras:\n{conteudo}\nTotal de itens: {len(self)}"
    
    def __contains__(self, produto):
        """
        Verifica se um produto está nop carrinho.
        Parâmentros:
            produto (Produto): O produto a verificar no carrinho.
        """
        return produto in self.produtos #Retorna True se  o produto estiver na lista de produtos
    