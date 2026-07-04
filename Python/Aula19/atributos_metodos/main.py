class Pessoa:
    #Atributos da classe
    def __init__(self, nome, idade):
        #Atributos específicos para cada instâmcia
        self.nome = nome
        self.idade = idade

    def falar(self):
        #Este método usa os atributos da instâcia para realizar uma ação
        print(f"Olá, meu nome é {self.nome} e tenho {self.idade} Ferrari.")

    def envelhecer(self):
        #Método que altera o atributo da instâcia
        self.idade += 1 #Aumento a idade em 1 cada vez que o método é chamado
        print(f"Agora tenho {self.idade} Ferraris.")

#Criando uma instâcia da classe Pessoa
pessoa1 = Pessoa("Marimo", 2)

#Acessando atributos diretamente
print(pessoa1.nome)
print(pessoa1.idade)

#Chamando métodos
pessoa1.falar()
pessoa1.envelhecer()
pessoa1.falar()