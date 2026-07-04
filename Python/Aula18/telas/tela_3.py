import tkinter as tk

class Tela_3(tk.Frame):
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

        #Widgets centralizados
        label = tk.Label(inner_frame, text="Você está na Tela 3", font=("Arial Black", 14))
        label.grid(row=2, column=0, padx=25, pady=25, sticky="nsew")

        btn_back = tk.Button(inner_frame, text="Voltar para a Tela 1", command=lambda: parent.show_frame(parent.frame1))
        btn_back.grid(row=1, column=0, pady=15, sticky="nsew")
