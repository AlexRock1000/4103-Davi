opçoes = [1,2,3,4,5]

print("ESCOLHA UMA OPÇÃO")
for i, opçao in enumerate(opçoes):
    print(f"{i+1}. Opção {opçao}")

opçao = input("Escolha uma opção: ")
print(f"Você escolheu a opção {opçao}")