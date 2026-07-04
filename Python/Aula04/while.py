#Solicitar número ao usuário até que ele digite um número maior que 100
numero = 0

while numero <= 100:
    numero = int(input("Digite um número: "))

#Usando while para solicitar entrada enuqanto o usuário digitar algo diferente do esperado
entrada = ""

while entrada != "sair":
    entrada = input("Digite 'sair' para sair: ")

#Exemplo de maior (>) o loop continuará enquanto o valor digitado for maior que 10
entrada_ = int(input("Dighite um número maior que 10 para continuar: "))
while entrada_ > 10:
    entrada_ = int(input("digite novamente: "))

#Exemplo de menor (<) o loop continuará enquanto o valor for menor que 5
entrada_ = int(input("Dighite um número menor que 5 para continuar: "))
while entrada_ < 5:
    entrada_ = int(input("digite novamente: "))

#Este código solicita ao usuário uma resposta e continua executando enquanto a resposta for "sim"
respota = input("Deseja continuar? (digite 'sim' para continuar): ")

#A função lower() transforma toda a string em letras minúsculas
while respota.lower() == "sim":
    respota = input("Deseja continuar? (digite 'sim' para continuar): ")

#Solicitar números ao usuário até que ele digite um número maior que 0 e menor ou igual a 100
numero_ = 1
while 0 < numero_ < 100:
    numero_ = int(input("Digite um número maior que 0 e menor ou igual a 100: "))