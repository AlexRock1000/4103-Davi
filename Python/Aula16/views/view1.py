def view1():
    while True:
        print("\nVocê está na View 1.")
        print("1. Voltar ao Menu Principal")
        choice = input("Escolha uma opção: ")
        if choice == "1":
            return #Retorna para o menu principal
        
        else: print("Opção inválida. Tente novamente.")
