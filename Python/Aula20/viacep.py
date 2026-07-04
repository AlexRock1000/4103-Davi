import requests

def consultar_cep(cep):
    #Remove qualquer caractere não numérico do CEP
    cep = ''.join(filter(str.isdigit, cep))

    #URL da API Viacep
    url = f"https://viacep.com.br/ws/{cep}/json/"

    #Faz a requisisão GET para a API
    resposta = requests.get(url)

    #Verifica se a respota foi bem-sucedida
    if resposta.status_code == 200:
        dados = resposta.json()

        #Verifica se o CEP existe
        if "erro" not in dados:
            print(f"""
            CEP: {dados['cep']}
            Logradouro: {dados['logradouro']}
            Bairro: {dados['bairro']}
            Cidade: {dados['Localidade']}
            Estado: {dados['uf']}
            """)

        else: print("CEP nçai encontrado.")
    else: print("Erro ao consultar API.")

#Solicita o CEP ao usuário
cep_usuario = input("Digite o CEP: ")
consultar_cep(cep_usuario)