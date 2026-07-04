class Aluno:
    lista_alunos = ["Pezildo", "Gordeiro", "Pauludo"]

    @classmethod
    def ler_alunos(cls):
        print("Lista de alunos:")
        for aluno in cls.lista_alunos:
            print(aluno)

Aluno.ler_alunos()