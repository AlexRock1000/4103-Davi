from decimal import Decimal, getcontext

#Configuração da precisão decimal
getcontext().prec = 4

#Função de conversão
def converte_moeda(valor, taxa):
    return valor * Decimal(taxa)

def main():
    print("Calculadora de Conversão de Moedas")

#Taxas de câmbio
taxas = {
    "1": Decimal("0.19"), #Dólar (1/5.25)
    "2": Decimal("0.18"), #Euro (1/5.63)
    "3": Decimal("27.03"), #Iene Japonês (1/0.037)
    "4": Decimal("0.67"), #Novo shekel israelense (1/1.48)
    "5": Decimal("4.76"), #Peso Cubano (1/0.21)
}

valor_real = Decimal(input("Digite o valor em Reais: R$ "))
print("""
Escolha a moeda que deseja converte:
1 - Dólar (USD)
2 - Euro (EUR)
3 - Iene Japonês (JPY)
4 - Novo shekel israelense (ILS)
5 - Peso Cubano (CUP)""")

escolha = (input("Digite a opção deseja: "))

if escolha in taxas:
    valor_convertido = converte_moeda(valor_real, taxas[escolha])
    print(f"O valor de R$ {valor_real:.2f} fica {valor_convertido:.2f} na moeda escolhida.")

else: print("Opção inválida.")

if __name__ == "__main__":
    main()