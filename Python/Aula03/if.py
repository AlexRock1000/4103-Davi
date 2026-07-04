#Solicitar a idade do usuário
idade = int(input("digite sua idade: "))

#Verificar se a idade é maoir ou igual a 18
if idade >= 18:
    print("Você pode ver porno!")

else: print("Você não pode ver porno.")

#Solicitar a nota do aluno em uma disciplina
nota = float(input("Digite a nota do aluno: "))

#Verificar a situação do aluno com base na nota
if nota >= 9:
    print("Nota A - Excelente!")
elif 7 >= nota > 9:
    print("Nota B - Bom!")
elif 5 >= nota > 7:
    print("Nota C - Regular!")
elif nota < 5:
    print("Nota D - Insulficiente!")
    
#Solicitar os anos de experiência do profissional
anos_experienc = int(input("Quantos anos de experiência o profissional possui: "))

#Verificar a classificação do profissional com base nos anos de experiência
if anos_experienc < 5:
    print("Profissional em início de carreia - Júnior")

elif 5 <= anos_experienc > 10:
    print("Profissional Pleno")

elif 10 <= anos_experienc > 15:
    print("Profissional Sênior")

else: print("Profissional Master!")