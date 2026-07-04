usuarios = ["Luiz", "Felipe", "Tiago", "Ricardo"]
opcoes = ["C - Cadastrar Usuário", "R - Leitura de usuários", "U - Atualizar Usuário", "D - Deletar Usuário"]

print("Escolha uma opção:")

for i, opcao in enumerate(opcoes, start=1):
    print(f"{i}. {opcao}")

opcao = int(input("Digite o número da opção desejada: "))

while opcao > 0 and opcao < 5: 
    if opcao == 1:
        print("Você escolheu a opção Cadastro.")
        novo_usuario = input("Digite o nome do novo usuário: ")
        usuarios.append(novo_usuario)
        print(f"Usuário {novo_usuario} cadastrado com secesso!")

    elif opcao == 2:
        print("Você escolheu a opção Leitura.")  
        for usuario in usuarios:
            print(usuario) 

    elif opcao == 3:
        print("Você escolheu a opção atualização.")
        for i, usuario in enumerate(usuarios, start=1):
            print(f"{i}. {usuario}")
        indice = int(input("Digite o número do usuário que deseja atualizar: ")) - 1

        if 0 <= indice and indice < len(usuarios):
            novo_nome = input(f"Digite o novo nome para {usuarios[indice]}: ")
            usuarios[indice] = novo_nome
            print(f"Usuário atualizado para {novo_nome} com secusso!")
        else: print("Usuário inválido.")

    elif opcao == 4:
        print("Você escolheu a opção Deletar usuário.")
        for i, usuario in enumerate(usuarios):
            print(f"{i+1}. {usuario}")
        indice = int(input("Digite o número do usuário que deseja excluir: ")) - 1

        if 0 <= indice and indice < len(usuarios):
            removido = usuarios.pop(indice)
            print(f"Usuário {removido} exluído com sucesso!")
        else: print("Usuário inválido.")

    opcao = int(input("Digite o número da opção desejada: "))

print("Opção inválida. Tente novamente.")
print("Encerrando o sistema")




