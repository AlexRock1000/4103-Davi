usuarios = ["Zezinho", "Fulaninho", "Sicrano", "Beltrano"]
opçoes = ["Leitura de usuarios", "Opção 2", "Opção 3", "Opção 4"]

print("Escolha uma opção:")
for i, opcao in enumerate(opçoes):
    print(f"{i+1}. {opcao}")

opcao = int(input("\nDigite o número da opção desejada: "))

while opcao > 0 and opcao < 5: 
    if opcao == 1:
        print("\nVocê escolheu a opção de leitura.\n")
        for usuario in usuarios:
            print(usuario)

    elif opcao == 2:
        print("Você escolheu a opção 2.")
    elif opcao == 3:
        print("Você escolheu a opção 3.")
    elif opcao == 4:
        print("Você escolheu a opção 4.")

    opcao = int(input("\nDigite o número da opção desejada: "))

print("\nOpção inválida. Tente novamente.")
print("Encerrando o sistema\n")

