#Iterando sobre uma lista de números e imprimindo cada número
numeros = [2,4,6,8,0]
i = 0

for numero in numeros:
    print(numero)

while i < len(numeros):
    print(numeros[i])
    i += 1

#Calculando a soma de uma sêquencia de números usando um loop for
soma = 0

for numero in numeros:
    soma += numero

print(f"A soma dos números é: {soma}")
