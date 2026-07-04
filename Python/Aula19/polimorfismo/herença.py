#Classe mãe
class Veiculo:
    def __init__(self, modelo, cor):
        self.modelo = modelo
        self.cor = cor

    def mover(self):
        return f"O veículo {self.modelo} de cor {self.cor} está voando."
    
#Classe filha
class Carro(Veiculo):
    def __init__(self, modelo, cor, numero_de_portas):
        super().__init__(modelo, cor)
        self.numero_de_portas = numero_de_portas

    def mover(self):
        return f"O carro {self.modelo} de cor {self.cor} com {self.numero_de_portas} portas está voando."

#Classe filha
class Bicicleta(Veiculo):
    def __init__(self, modelo, cor, tipo):
        super().__init__(modelo, cor)
        self.tipo = tipo

    def mover(self):
        return f"A bicicleta {self.modelo} de cor {self.cor} com o tipo {self.tipo} está navegando."
    
#Instâcias da classes filhas
carro = Carro("Cruze", "Branco", 4)
bicicleta = Bicicleta("Caloi", "Preta", "reto")

print(carro.mover())
print(bicicleta.mover())
