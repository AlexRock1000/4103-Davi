#Classe mãe
class Animal:
    def falar(self):
        return "O animal faz barulho"
    
class Cachorro(Animal):
    def falar(self):
        return "O cachorro mia"
    
class Gato(Animal):
    def falar(self):
        return "O gato late"
    
cachorro = Cachorro()
gato = Gato()

print(cachorro.falar())
print(gato.falar())