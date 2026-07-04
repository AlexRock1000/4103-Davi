#Definido uma classe chamada "Carro"
class Carro:
    def __init__(self, marca, modelo, ano):
        self.marca = marca
        self.modelo = modelo
        self.ano = ano

    #Métedo para exibir informações sobre o carro
    def detalhes(self):
        return f"Carro: {self.modelo} {self.marca}, Ano: {self.ano}"
    
#Criando um objeto (instância) da Classe Carro
menu_carro = Carro("Toyota", "Corola", 2020)

#Chamando o método detalhes para exibir informações do carro
print(menu_carro.detalhes())

class Pessoa:
    #Lista para armazenar pessoas
    lista_pessoas = []

    def __init__(self, nome, idade, naturalidade):
        self.nome = nome
        self.idade = idade
        self.naturalidade = naturalidade

    def detalhes(self):
        return f"Nome: {self.nome}, Idade: {self.idade}, Estado de nascimento: {self.naturalidade}"
    
    @classmethod
    def adicionar(cls, pessoa):
        cls.lista_pessoas.append(pessoa)

    @classmethod
    def exibir_pessoas(cls):
        for pessoa in cls.lista_pessoas:
            print(pessoa.detalhes())

#Criando instâncias de pessoas
pessoa1 = Pessoa("Marcos Lulinha", 30, "SP")
pessoa2 = Pessoa("Emanuel Caneta Azul", 56, "PR")

#Adicionar as instâncias à lista usando o método da classe
Pessoa.adicionar(pessoa1)
Pessoa.adicionar(pessoa2)

#Exibir todas as pessoas cadastradas usando o método
Pessoa.exibir_pessoas()

print("")