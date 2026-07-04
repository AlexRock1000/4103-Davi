while True:
    try: 
        numero = int(input("Digite um número: "))
        print(f"O dobro do número é: {numero * 2}")
        break

    except ValueError:
        print("Erro: Digite um número válido.")

class ErroPersonalizado(Exception):
    def __init__(self, mensagem="Erro personalizado: valor negativo não permitdo."):
        super().__init__(mensagem)

while True:
    try:
        numero = int(input("Digite outro número: "))
        if numero < 0:
            raise ErroPersonalizado()
        resultado = 10 / numero
        print(f"Resultado: {resultado}")
        break
    except ValueError:
        print("Erro: Digite um número.")
    except ZeroDivisionError:
        print("Erro: Não é possível dividir por zero.")
    except ErroPersonalizado as e:
        print(e)
    except Exception as e:
        print(f"Ocorreu um erro inesperado: {e}")