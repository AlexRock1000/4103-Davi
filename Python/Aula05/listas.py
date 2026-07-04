#Criando uma lista de números
numeros = [1,3,5,7,]

#Acessando elementos da lista
print("Primeiro elemento:", numeros[0])
print("Último elemento:", numeros[-1])

#Modificando um elemento da lista
numeros[0] = 10
print("Lista após a modificação:", numeros)

#Adcionando um novo elemento à lista
numeros.append(6)
print("Lista após a adição:", numeros)

#Removendo o último elemneto da lista
ultimo_elemento = numeros.pop()
print("Elemento removido:", ultimo_elemento)
print("Lista após a remoção:", numeros)

#Removendo um elemento específico da lista
numeros.remove(5)
print("Lista após a remoção:", numeros)

#Removendo um elemento específico pelo índice da lista
print("Elemneto que será removido:", numeros[2])
del numeros[2]
print("Lista após a remoção:", numeros)