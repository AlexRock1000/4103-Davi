import tkinter as tk

class Tela_1(tk.Frame):
    def __init__(self, parent):
        super().__init__(parent)
        self.grid(row=0, column=0, sticky="nsew")

        #Configurar o layout responsivo do frame
        self.grid_rowconfigure(0, weight=1)
        self.grid_columnconfigure(0, weight=1)

        #Frame central interno para centralização de widgets
        inner_frame = tk.Frame(self)
        inner_frame.grid(row=0, column=0)
        inner_frame.grid_rowconfigure(0, weight=1)
        inner_frame.grid_columnconfigure(0, weight=1)

        btn_next1 = tk.Button(inner_frame, text="Ir para Tela 2", command=lambda: parent.show_frame(parent.frame2))
        btn_next1.grid(row=2, column=0, pady=5, sticky="nsew")

        btn_next2 = tk.Button(inner_frame, text="Ir para Tela 3", command=lambda: parent.show_frame(parent.frame3))
        btn_next2.grid(row=3, column=0, pady=5, sticky="nsew")
