opçoes = [1,2,3,4]

print("ESCOLHA UMA OPÇÃO")
for i, opçao in enumerate(opçoes):
    print(f"{i+1}. Opção {opçao}")

opçao = int(input("Digite uma opção: "))

if opçao == 1:
    print("Escolheu opção 1.")
elif opçao == 2:
    print("Escolheu opção 2.")
elif opçao == 3:
    print("Escolheu opção 3.")
elif opçao == 4:
    print("Escolheu opção 4.")

else: print("Opção inválida.")