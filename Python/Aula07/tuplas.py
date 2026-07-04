#Criando uma tupla
carros = ("Fusca", "Civic", "Corolla")

#Acessando elementos
print(carros[0])

#Para adicionar ou remover elementos é necessário criar uma nova tupla
carros = carros + ("Ferrari",)
print(carros)

#Slicing (possível e, lista, tuplas e strings)
print(carros[2:])

informaçoes = ("Cesar", 29, "Pedreiro")
print(informaçoes)

nome, idade, profissao = informaçoes
print(f"Nome: {nome}, Idade: {idade}, Profissão: {profissao}")

#Contando a ocorrência do número 2
tupla = (1,2,3,4,5,6,7,8)
print(tupla.count(2))

#Encontrando o índice da primeira ocorrência do número 2
print(tupla.index(2))

#Obtendo o comprimento da tupla
print(len(tupla))

#Encontrando o maior elemento da tupla
print(max(tupla))

#Encontrando o menor elemento da tupla
print(min(tupla))

#Calculando a soma de todos os elmentos da tupla
print(sum(tupla))

#Verificando se algum elemento é verdadeiro
print(any(tupla))

#Verificando se todos os elementos são verdadeiros
print(all(tupla))

#Ordenando a tupla (retorna uyma lista)
print(sorted(tupla))

#Revertendo a tupla (retorna um iterador)
print(list(reversed(tupla)))