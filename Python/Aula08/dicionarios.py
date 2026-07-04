#Criando um dicionário
precos = {"banana": 7.9, "maçã": 8.7, "laranja": 4.9}

#Adicionando um novo par chave-valor
precos["abacaxi"] = 5.5
print(precos)

#Removendo um item do dicionário
del precos["maçã"]
print(precos)

#Modoficando o valor de uma chave existente
precos["banana"] = 9
print(precos)

#Verificando se uma chave está no dicionário
print("abacaxi" in precos)

#Escrevendo o valor de uma chave especifica
print(precos["abacaxi"])