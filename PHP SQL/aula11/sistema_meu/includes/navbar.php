<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?php echo BASE_URL; ?>/dashboard.php">
                <strong>Sistema de Estoque</strong>
            </a>
            <!-- Botão para dispositivos móveis -->
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <!-- Menu que será alternado -->
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="<?php echo BASE_URL; ?>/clientes/index.php">Clientes</a>
                <a class="navbar-item" href="<?php echo BASE_URL; ?>/produtos/index.php">Produtos</a>
                <a class="navbar-item" href="<?php echo BASE_URL; ?>/vendas/index.php">Vendas</a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="<?php echo BASE_URL; ?>/logout.php" class="button is-light">
                            Sair
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // Obtém todos os elementos com a classe "navbar-burger"
  const navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Verifica se há algum botão "navbar-burger"
  if (navbarBurgers.length > 0) {
    // Adiciona um evento de clique a cada botão
    navbarBurgers.forEach(el => {
      el.addEventListener('click', () => {
        // Obtém o alvo do menu a partir do atributo "data-target"
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Alterna a classe "is-active" no botão e no menu
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
});
</script>
