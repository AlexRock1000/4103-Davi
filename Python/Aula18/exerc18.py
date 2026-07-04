import tkinter as tk

janela = tk.Tk()

# Definir o título da janela
janela.title("Exercicio 18!")

# Definir o tamanho da janela
janela.geometry("300x150")  # Largura 300 e altura 150

# Nome da pessoa (configurado inline)
nome = "Zé da manga!"

# Exibir a mensagem de boas-vindas com o nome
label = tk.Label(janela, text=f"Bem-vindo, {nome}!", font=("Arial Black", 14))
label.pack(padx=30, pady=30)

# Iniciar o loop da interface gráfica
janela.mainloop()
