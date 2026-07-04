import pandas as pd
import os

current_dir = os.path.dirname(os.path.abspath(__file__))
file_path = os.path.join(current_dir, 'exercicio_pandas.xlsx')

if os.path.isfile(file_path):
    #Carrega a tabela de vendas a partr do arquivo Excel
    df_vendas = pd.read_excel(file_path)

    #Contar o número de vendas por vendedor
    vendas_por_vendedor = df_vendas['Vendedor'].value_counts()

    #Obter os 3 vendedores com mais vendas
    top_3_vendedores = vendas_por_vendedor.head(3)

    #Obter os 3 vendedores com menos vendas, do pior para o melhor
    bottom_3_vendedores = vendas_por_vendedor.tail(3).iloc[::-1]

    print("Top 3 vendedores com mais vendas:")
    for vendedor, quantidade in top_3_vendedores.items():
        print(f"{vendedor}: {quantidade} vendas.")

    print("\nPiores 3 vendedores com menos vendas")
    for vendedor, quantidade in bottom_3_vendedores.items():
        print(f"{vendedor}: {quantidade} vendas.")

else: print(f"O arquivo {file_path} nçao foi encontrado.")