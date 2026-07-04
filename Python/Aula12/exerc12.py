import matplotlib.pyplot as plt

vendedores = ["Alice", "Bob", "Charlie Brow Jr.", "Shalon", "Deb", "Lod"]
vendas = [1000, 3999, 5000, 2874, 3654769, 1111111]

#Combinar vendedores com vendas em uma lista de tuplas
vendedores_vendas = list(zip(vendedores, vendas))

#Ordenar os vendedores com bases nas vendas do maior para o menor
vendedores_vendas.sort(key=lambda x: x[1], reverse=True)

#Selecionar os 4 melhores vendedores
melhores_vendedores = [v[0] for v in vendedores_vendas[:4]]
melhores_vendas = [v[1] for v in vendedores_vendas[:4]]

#Criando o gráfico de pizza
plt.pie(melhores_vendas, labels=melhores_vendedores, autopct='%1.!f%', startangle=90)
plt.title("Top 4 vendedores")
plt.show()