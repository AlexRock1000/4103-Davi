#Criando uma array de tamanho 5
numeros = [0] * 5

#Solicitando 5 inteiros ao usuário
for i in range(5):
    numeros[i] = int(input("Digite o {}º número inteiro: ".format(i + 1)))
    print("")
#Imprimindo cada número com sua posição na lista 
for i, numero in enumerate(numeros):
    print("O número {} está na posição {} da lista.".format(numero, i))
print("")
#Lista de produtos
produtos = ["PC Gamer", "Xboox Series S", "PlayStation 2", "PlayStation 5", "PlayStation 3"]
valores = [12000, 3000, 2000, 6000, 3000]

#Percorrendo duas lista ao mesmo tempo com zip
for produto, valor in zip(produtos, valores):
    print("O valor de {} é R${}".format(produto, valor))
print("")

#range()
for i in range(len(produtos)):
    print("O valor de {} é R$ {}".format(produtos[i], valores[i]))

print("")
#enumerate()
for i, produto in enumerate(produtos):
    print("O valor de {} é R$ {}".format(produto, valores[i]))

print("")
