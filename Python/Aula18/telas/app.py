import tkinter as tk
from tela_1 import Tela_1
from tela_2 import Tela_2
from tela_3 import Tela_3

class Application(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Aplicativo com Múltiplas Telas")
        self.geometry("400x200")
        self.resizable(True, True)

        #Instanciar as telas
        self.frame1 = Tela_1(self)
        self.frame2 = Tela_2(self)
        self.frame3 = Tela_3(self)

        #Configurar layout responsivo
        self.grid_rowconfigure(0, weight=1)
        self.grid_columnconfigure(0, weight=1)

        #Exibir a tela inicial
        self.show_frame(self.frame1)

    def show_frame(self, frame):
        frame.tkraise()

if __name__ == "__main__":
    app = Application()
    app.mainloop()