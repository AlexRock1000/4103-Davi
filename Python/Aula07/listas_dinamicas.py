lista_carros = []

quantidade = int(input("Quantos carros você deseja adicionar? "))

#Adicionando carros à lista conforme a quantidade especificada
for i in range(quantidade):
    carro = input(f"Deigit o nome do carro {i+1}: ")
    lista_carros.append(carro)
print("")
print(f"Lista de carro criada: {lista_carros}")
print("")
#Criando um loop para exibir a posição e o carro na lista
for i, carro in enumerate(lista_carros):
    print(f"Na lista a posição {i} está o carro: {carro}")
print("")

#Solicitando o índice para excluir
i_exclusao = int(input(f"Digite o índice de 0 a {len(lista_carros) - 1} para excluir um carro: "))

#Verificando se o índice está dentro do intervalo válido
if 0 <= i_exclusao < len(lista_carros):
    carro_removido = lista_carros.pop(i_exclusao)
    print(f"O carro '{carro_removido}' foi removido da lista.")

else: print("Erro: índice inválido.")

print(f"Lista de carros: {lista_carros}")