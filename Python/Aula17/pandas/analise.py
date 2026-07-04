import pandas as pd
import os

#Obtendo o diretório onde o script está sendo executado
current_dir = os.path.dirname(os.path.abspath(__file__))

#Definindo o caminho do arquivo
file_path = os.path.join(current_dir, 'vendas_eletronicos.xlsx')

#Verificando se o arquivo existe
if os.path.isfile(file_path):
    #Carrega a tabela de vendas a partr do arquivo Excel
    df_vendas = pd.read_excel(file_path)

    #Agrupar os dados por produtos e somar as quantidades vendidas
    produtos_vendidos = df_vendas.groupby('Produto')['Quantidade'].sum()

    #Contar quantas vezes cada produto foi vendido
    vendas_count = df_vendas.groupby('Produto')['Quantidade'].size()

    #Calcular o total de vendas usando o nome correto da coluna "Preço Unitário"
    total_vendas = df_vendas.groupby('Produto').apply(lambda x: (x['Quantidade'] * x['Preço Unitário']).sum(), include_groups=False)

    #Combinar os rsultados em um Dataframe
    resultados = pd.DataFrame({
    'Total Vendido': produtos_vendidos,
    'Quantidade de Vendas': vendas_count,
    'Total de Vendas': total_vendas})

    #Formatar a coluna 'Total de Vendas' em reais
    resultados['Total de Vendas'] = resultados['Total de Vendas'].apply(lambda x: f'R$ {x:,.2f}')

    #Obter os 5 produtos mais vendidos
    top_5_produtos = resultados.nlargest(5, 'Total Vendido')

    #Exibir os resultados
    print(top_5_produtos)

    #Criar uma nova aba com o resumo no mesmo arquivo Excel
    with pd.ExcelWriter(file_path, engine='openpyxl', mode='a') as writer:
        resultados.to_excel(writer, sheet_name='Resumo', index=True) #Adiciona a aba 'Resumo'
        print("Resumo salvo com sucesso!")

else: print(f"O arquivo {file_path} não foi encontrado.")