class UsuarioException(Exception):
    """Classe base para exceções relacionadas a usuários."""
    pass

class ArquivoNaoEncontradoException(UsuarioException):
    """Exceção para quando o arquivo de usuário não é encontrado."""
    def __init__(self):
        super().__init__("O arquivo de usuário não foi encontrado. Verifique se o caminho está correto.")

class UsuarioInvalidoException(UsuarioException):
    """Exceção para quando o usuário é inválido."""
    def __init__(self):
        super().__init__("Índice de usuário inválido. Escolha um número válido.")

class ErroDeDecodificaçaoException(UsuarioException):
    """Exceção para erros de decodificação de dados do usuário."""
    def __init__(self):
        super().__init__("Erro ao decodificar os arquivo JSON. Verifique o arquivo está corrompido.")

class EntradaInvalidaException(UsuarioException):
    """Exceção para quando a entrada do usuário é inválida."""
    def __init__(self):
        super().__init__("Entrada inválida. Por favor, digite um número.")
