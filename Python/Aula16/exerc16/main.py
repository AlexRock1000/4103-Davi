from views.view1 import view1
from views.view2 import view2

def menu():
    while True:
        print("""
    ----------------
     Menu Principal
    ----------------
    1 - Ir para View 1.
    2 - Ir para View 2.
    3 - Sair
    """)
        
        opçao = input("Escolha: ")

        try:
            if opcao == 1:view1_menu()
            elif opcao == 2: view2_menu()
            elif opcao == 3: 
                print("Encerrando o sistema.")
                break                
            else:
                print("Opção inválida. Tente novamente.")
        except ValueError:
            print(f"Erro: {e}")

if __name__ == "__main__":
    menu()