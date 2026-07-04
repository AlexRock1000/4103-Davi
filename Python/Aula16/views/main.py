from view1 import view1
from view2 import view2
from view3 import view3

def main_menu():
    while True:
        print("\nMenu Principal:")
        print("1. Ir para View 1.")
        print("2. Ir para View 2.")
        print("3. Ir para View 3.")
        print("4 - Sair")

        choice = input("Escolha uma opção: ")
        try:
            if choice == "1":
                view1()
            elif choice == "2":
                view2()
            elif choice == "3":
                view3()
            elif choice == "4":
                print("Saindo")
                break
            else:
                print("Opção inválida. Tente novamente.")
        except ValueError:
            print("Erro")

if __name__ == "__main__":
    main_menu()