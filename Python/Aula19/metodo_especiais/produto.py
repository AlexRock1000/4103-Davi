class Produto:
    def __init__(self, nome, preco):
        """
        Iniciando um novo produto com um nome e um preço.
        """
        self.nome = nome
        self.preco = preco

    def __str__(self):
        """
        Mensagem padrão que é exibida quando usando print(produto)
        """
        return f"{self.nome} - R$ {self.preco:.2f}"
    
    def __repr__(self):
        """
        Retorna uma representação do objeto Produto para debugging.
        """
        return f"Produto(nome='{self.nome}', preco={self.preco})"
    
    def __eq__(self, outro):
        """
        Compara dois produtos para ver se são iguais.
        Parâmetros:
            Outro (Produto): Outro objeto Produto para comparar.
        
        Retorna:
            bool: True se os produtos t~em o mesmo nome e preço, False caso contrário.
        """
        return self.nome == outro.nome and self.preco == outro.preco
    