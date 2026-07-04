from produto import Produto
from carrinho import Carrinho

produto1 = Produto("Camisa", 300)
produto2 = Produto("Moto-serra", 25.90)
produto3 = Produto("Pedra", 14.90)

carrinho = Carrinho()

carrinho.adicionar_produto(produto1)
carrinho.adicionar_produto(produto2)

print(f"Total de itens no carrinho: {len(carrinho)}")

print(carrinho)

print(produto1 in carrinho)
print(produto3 in carrinho)
