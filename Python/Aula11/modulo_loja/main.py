from modelos.vendedor import Vendedor
from modelos.produto import Produto

def main():
    # Lista de vendedores
    lista_vendedores = [
        Vendedor("João", 1),
        Vendedor("Maria", 2),
        Vendedor("Pedro", 3)
    ]

    # Lista de produtos
    lista_produtos = [
        Produto("Teclado Mecânico ThunderKey", 499.90),
        Produto("Mouse Óptico DarkClaw", 249.90),
        Produto("Headset StormSound", 399.00),
        Produto("Monitor UltraWide DragonView", 1999.00),
        Produto("Cadeira Gamer ShadowSeat", 899.90),
        Produto("Mousepad RGB FireTrail", 149.90),
        Produto("Placa de Vídeo Inferno GTX", 3499.90),
        Produto("Controle DualForce Pro", 299.90),
        Produto("Microfone ThunderMic", 279.90),
        Produto("Webcam HD NightVision", 189.90)
    ]

    # Exibir vendedores
    print("---- Vendedores ----")
    for vendedor in lista_vendedores:
        vendedor.exibir_vendedor()

    # Exibir produtos
    print("\n---- Produtos ----")
    for produto in lista_produtos:
        produto.exibir_produto()

if __name__ == "__main__":
    main()
