print("Escolha uma opção:")
print("1. Opção 1")
print("2. Opção 2")
print("3. Opção 3")
print("4. Opção 4")

opcao = int(input("\nDigite o número da opção desejada: "))

while opcao > 0 and opcao < 5:
    if opcao == 1:
        print("Você escolheu a opção 1.")
    elif opcao == 2:
        print("Você escolheu a opção 2.")
    elif opcao == 3:
        print("Você escolheu a opção 3.")
    elif opcao == 4:
        print("Você escolheu a opção 4.")

    opcao = int(input("\nDigite o número da opção desejada: "))

print("\nOpção inválida. Tente novamente.")
print("Encerrando o sistema.\n")