#Menu para o usuário
def menu():
    print("""
Escolha uma das opções:
1 - Somar
2 - Subtrair
3 - Multiplicação
4 - Dividir
0 - Sair
          """)
    
#Funções da calculadora
def somar(a, b):
    return a + b

def subtrair(a, b):
    return a - b

def multiplicar(a, b):
    return a * b

def dividir(a, b):
    if b == 0:
        return "Erro na matrix."
    return a / b
    
#Programa principal
opçao = None

while opçao != "0":
    menu()
    opçao = input("Digite uma opção: ")

    if opçao == "0":
        print("Saindo da calculadora.")
        break
    if opçao in ["1","2","3","4"]:
        num1 = float(input("Digite o primeiro número: "))
        num2 = float(input("Digite o segundo número: "))

        if opçao == "1":
            print(f"Resultado da soma é: {somar(num1,num2)}")
        elif opçao == "2":
            print(f"Resultado da subtração é: {subtrair(num1,num2)}")
        elif opçao == "3":
            print(f"Resultado da multiplacação é: {multiplicar(num1,num2)}")
        elif opçao == "4":
            print(f"Resultado da divisão é: {dividir(num1,num2)}")

    else: print("Opção inválida.")