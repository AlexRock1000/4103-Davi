def view2():
    while True:
        print("\nVocê está na View 2.")
        print("1. Voltar ao Menu Principal")
        choice = input("Escolha uma opção: ")
        if choice == "1":
            return #Retorna para o menu principal
        
        else: print("Opção inválida. Tente novamente.")