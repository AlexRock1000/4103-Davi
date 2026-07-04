class NumeroNegativoException(Exception):
    def __init__(self, numero):
        super().__init__(f"O número {numero} é negativo. Por favor, digite um número positivo.")

def solicitar_numero():
    try:
        numero = int(input("Digite um número inteiro positivo: "))
        if numero < 0:
            raise NumeroNegativoException(numero)       
        print(f"Você digitou o número {numero}.")        
    except ValueError:
        print("Erro: Entrada inválida. Por favor, digite um número inteiro.")
    except NumeroNegativoException as e:
        print(f"Erro: {e}")
    
solicitar_numero()