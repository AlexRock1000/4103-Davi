import os
import json
from exceptions.usuario_exceptions import *
import datetime

class UsuarioSistema:
    def __init__(self):
        self.arquivo = 'projeto_pt5/dados/usuarios.json'  # Caminho para o arquivo JSON
        self.criar_arquivo()  # Garante que o arquivo exista
        self.usuarios = self.ler_usuarios()  # Carrega usuários do arquivo
        self.arquivo_deletados = 'projeto_pt5/dados/usuarios_deletados.json'
        self.criar_arquivo_deletados()

    def criar_arquivo(self):
        # Cria a pasta 'dados' se não existir
        os.makedirs(os.path.dirname(self.arquivo), exist_ok=True)       
        # Cria o arquivo se não existir
        if not os.path.exists(self.arquivo):
            with open(self.arquivo, 'w', encoding='utf-8') as f:
                json.dump([], f)  # Inicializa o arquivo como uma lista vazia

    def ler_usuarios(self):
        try:
            with open(self.arquivo, 'r', encoding='utf-8') as f:
                return json.load(f)
        except FileNotFoundError:  # Tratamento para arquivo não encontrado
            raise ArquivoNaoEncontradoException()  # Lança exceção personalizada
        except json.JSONDecodeError:  # Tratamento para erro de decodificação JSON
            raise ErroDeDecodificacaoException()  # Lança exceção personalizada
    
    def create(self):
        novo_usuario = input("Digite o nome do novo usuário: ")
        self.usuarios.append(novo_usuario)
        self.salvar_usuarios()  # Salva a lista atualizada no arquivo
        print(f"Usuário {novo_usuario} cadastrado com sucesso!")

    def read(self):
        print("Usuários cadastrados:")
        for i, usuario in enumerate(self.usuarios, start=1):
            print(f"{i}. {usuario}")

    def update(self):
        self.read()  # Exibe a lista de usuários
        try:
            indice = int(input("Digite o número do usuário que deseja atualizar: ")) - 1
            if 0 <= indice < len(self.usuarios):
                novo_nome = input(f"Digite o novo nome para {self.usuarios[indice]}: ")
                self.usuarios[indice] = novo_nome
                self.salvar_usuarios()  # Salva as alterações
                print(f"Usuário atualizado para {novo_nome} com sucesso!")
            else:
                raise UsuarioInvalidoException()
        except ValueError:  # Tratamento para entrada inválida
            raise EntradaInvalidaException()  # Lança exceção personalizada

    def delete(self):
        self.read()  # Exibe a lista de usuários
        try:
            indice = int(input("Digite o número do usuário que deseja excluir: ")) - 1
            if 0 <= indice < len(self.usuarios):
                removido = self.usuarios.pop(indice)
                self.salvar_usuarios()  # Salva as alterações
                self.salvar_usuario_deletado(removido) #Salva o usuário deletado
                print(f"Usuário {removido} excluído com sucesso!")
            else:
                raise UsuarioInvalidoException()
        except ValueError:  # Tratamento para entrada inválida
            raise EntradaInvalidaException()  # Lança exceção personalizada
            
    def salvar_usuarios(self):
        with open(self.arquivo, 'w', encoding='utf-8') as f:
            json.dump(self.usuarios, f, ensure_ascii=False)  # Salva a lista de usuários no arquivo

    def criar_arquivo_deletados(self):
        #Cria a pasta 'dados' se não existir
        os.makedirs(os.path.dirname(self.arquivo_deletados), exist_ok=True)
        #Cria o arquivo de deletados se não existir
        if not os.path.exists(self.arquivo_deletados):
            with open(self.arquivo_deletados, 'w', encoding='utf-8') as f:
                json.dump([], f) #Inicializado o arquivo como uma lista vazia

    def salvar_usuario_deletado(self, usuario):
        data_exclusao = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        usuario_deletado = {
            "nome": usuario,
            "data_exclusao": data_exclusao
        }
        #Carrega usuários deletados do arquivo
        with open(self.arquivo_deletados, 'r', encoding='utf-8') as f:
            usuarios_deletados = json.load(f)

        #Adicionar o novo usuário deletado e salvar de volta no arquivo
        usuarios_deletados.append(usuario_deletado)
        with open(self.arquivo_deletados, 'w', encoding='utf-8') as f:
            json.dump(usuarios_deletados, f, ensure_ascii=False)
    
    def recuperar_usuarios_deletados(self):
        try:
            #Carrega usuário deletados do arquivo
            with open(self.arquivo_deletados, 'r', encoding='utf-8') as f:
                usuarios_deletados = json.load(f)

            if not usuarios_deletados:
                print("Nenhum usuário para recuperar.")
                return
            
            print("Usuários deletados disponíveis para recuperar:")
            for i, usuario in enumerate(usuarios_deletados, start=1):
                print(f"{1}. Nome: {usuario['nome']}, Data de Exclusão: {usuario['data_exclusão']}")

            indice = int(input("Digite o número do usuário que deseja recuperar: ")) - 1
            if 0 <= indice < len(usuarios_deletados):
                usuario_recuperado = usuarios_deletados.pop(indice)
                self.usuarios.append(usuario_recuperado["nome"])
                self.salvar_usuarios() #Salva os usuários ativos atualizados

                #Atualiza o arquivo de usuários deletados
                with open(self.arquivo_deletados, 'w', encoding='utf-8') as f:
                    json.dump(usuarios_deletados, f, ensure_ascii=False)
                print(f"Usuário {usuario_recuperado['nome']} recuperado com sucesso!")

            else: raise UsuarioInvalidoException()
        except ValueError:
            raise EntradaInvalidaException()
    
