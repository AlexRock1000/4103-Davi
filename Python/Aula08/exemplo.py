#Criando uma lista de frutas disponíveis
frutas_disponiveis = ["banana", "maçã", "laranja"]

#Criando uma tupla com informações sobre uma fruta
info_fruta = ("banana", 3.5, 45)

#Criando um conjunto de frutas fora estoque
frutas_fora_estoque = {"maçã", "kiwi"}

#Criando um dicionário para associar frutas a preços e quantidades
estoque = {
    "banana": {"preço": 4.7, "quantidade": 60},
    "laranja": {"preço": 4, "quantidade": 20},
}

#Exibindo informações
print(f"frutas disponíveis: {frutas_disponiveis}")
print(f"Informações sobre a fruta: {info_fruta}")
print(f"Frutas fora de estoque: {frutas_fora_estoque}")
print(f"Estoque atualizado: {estoque}")

#Exibindo preço a quantidade da banana
print(f"Preço da banana: {estoque["banana"]["preço"]}")
print(f"Quantidade de banana: {estoque["banana"]["quantidade"]}")