import os
import json
from datetime import datetime

#Dados do log
log_data = {
    "mesagem":input("Digite uma mensagem para o log: "),
    "data": datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
    "pasta_atual": os.getcwd()
}

#Caminho do arquivo de los
caminho_log = os.path.join(os.getcwd(), "logEx.json")

#Carrega o log existente iu cria uma nova lista
if os.path.exists(caminho_log):
    with open(caminho_log, "r") as arquivo:
        logs = json.load(arquivo)

else: logs = []

#Adiciona o novo log e salva o arquivo
logs.append(log_data)
with open(caminho_log, "w") as arquivo:
    json.dump(logs, arquivo, indent=4)
    