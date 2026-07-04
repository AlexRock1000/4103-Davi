#Função para converter Celsius para Fahrenheit
def celsius_fahrenheit(celsius):
    return (celsius * 9/5) + 32

#Função para converte Fahrenheit para Celsius
def fahrenheit_celsius(fahrenheit):
    return (fahrenheit - 32) * 5/9

#Menu para o usuário
def menu():
    print("""
Escolha uma das opções:
1 - Converter Celsius para Fahrenheit
2 - Converte Fahrenheit para Celsius
3 - Sair
          """)
    
#Programa principal
opçao = None

while opçao != "3":
    menu()
    opçao = input("Digite sua opção: ")

    if opçao == "3":
        print("Saindo do programa.")
        break
    if opçao in ["1","2"]:
        temperatura = float(input("Digite a temperatura: "))

        if opçao == "1":
            Resultado = celsius_fahrenheit(temperatura)
            print(f"{temperatura} °C é igual a {Resultado} ºF")
        elif opçao == "2":
            Resultado = fahrenheit_celsius(temperatura)
            print(f"{temperatura} °F é igual a {Resultado} °C")

        else: print("Opção inválida. Tente novamente.")