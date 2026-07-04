import matplotlib.pyplot as plt

class Vendedor:
    def __init__(self, nome, total_vendas):
        self.nome = nome
        self.total_vendas = total_vendas

vendedores = [
    Vendedor("Biribinha", 1500.00),
    Vendedor("Florentina", 2000.00),
    Vendedor("Baitola", 2300.00),
    Vendedor("Enzo", 3000.00)
]

#Extraindo nomes e totais de vendas para o gráfico
nomes = [v.nome for v in vendedores]
vendas_totais = [v.total_vendas for v in vendedores]

#Criando o gráfico de barras
plt.figure(figsize=(10, 5))
plt.bar(nomes, vendas_totais, color='black')
plt.title("Total de vendas por vendedor")
plt.xlabel("Vendedores")
plt.ylabel("Total de vendas R$")
plt.grid(axis='y')

#Exibindo o gráfico
plt.show()