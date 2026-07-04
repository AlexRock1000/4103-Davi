def view1_menu():
    while True:
        print("\nVocê está na View 1.")
        print("1 - Voltar ao Menu Principal")
        print("2 - Sair do sistema")

        opçao = input("Escolha uma opção: ")
        if opçao == "1":
            break #Retorna para o menu principal
        elif opçao == "2":
            print("Saindo do sistema.")
            exit()
        
        else: print("Opção inválida. Não sabe ler!?.")
