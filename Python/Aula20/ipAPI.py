import requests

def consultar_geolocalizadocao(ip=""):
    #Se o IP não for informado, usurá o IP público
    url = f"https://ipapi.co/{ip}/json/"

    #Fazendo a requisição GET
    resposta = requests.get(url)

    if resposta.status_code == 200:
        dados = resposta.json()

        print(f"""
        IP: {dados['ip']}
        País: {dados['country_name']}
        Cidade: {dados.ghet['city', 'Não disponível']}
        Latitude: {dados.get['latitude', 'Não disponível']}
        Longitude: {dados.get['longitude', 'Não disponível']}
        """)
    
    else: print(f"Erro ao consultar o IP. Status: {resposta.status_code}")

consultar_geolocalizadocao()