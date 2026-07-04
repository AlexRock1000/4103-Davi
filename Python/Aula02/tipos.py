#Exemplo de tipagem de variáveis em Python
idade = 28
altura = 1.84
nome = "Teu pai"
id_estudante = True
#Tipos de dados básicos
print(type(idade))
print(type(altura))
print(type(nome))
print(type(id_estudante))

#Declarando a variável idade com int
idade: int(input("Digite sua idade: "))

#Testo contendo o número como string
numero = "28"

#Verificando o tipo do número antes da conversão
print(type(numero))

#Convertendo o texto para um número interio
numero_int = int(numero)

#Verificando o tipo do número após a conversão
print(type(numero_int))
