import os
import json

#Criar a pasta "dados" se ela não existir
if not os.path.exists('exercico13/dados'):
    os.makedirs('exercico13/dados')

frutas = ['maçã', 'banana', 'laranja', 'uva', 'abacaxi']

#Caminho do arquivo onde a lista será salva
caminho_arquivo = os.path.join('exercico13/dados', 'frutas.json')

#Salvar a lista no arquivo JSON
with open(caminho_arquivo, 'w', encoding='utf-8') as arquivo_json:
    json.dump(frutas, arquivo_json, ensure_ascii=False, indent=4)

print(f'Arquivo {caminho_arquivo} criado com sucesso!')
