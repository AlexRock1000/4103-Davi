<section class="section">
    <div class="container">
        <h1 class="title">Editar Produto</h1>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Código *</label>
                        <div class="control">
                            <input class="input" type="text" name="codigo" value="#" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome *</label>
                        <div class="control">
                            <input class="input" type="text" name="nome" value="#" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Categoria *</label>
                        <div class="control">
                            <input class="input" type="text" name="categoria" value="#" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Quantidade em Estoque *</label>
                        <div class="control">
                            <input class="input" type="number" name="quantidade" value="#" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Compra *</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="valor_compra" value="#" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Venda *</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="valor_venda" value="#" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Imagem do Produto</label>
                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="imagem" accept="image/*">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Escolher arquivo...
                            </span>
                        </span>
                        <span class="file-name"> </span>
                    </label>
                </div>
                <?php if ($produto['imagem']): ?>
                    <figure class="image is-128x128 mt-3">
                        <img src="#" alt="Imagem do produto">
                    </figure>
                <?php endif; ?>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Atualizar Produto</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
// Atualiza o nome do arquivo no input de upload
document.querySelector('.file-input').onchange = function() {
    const fileName = this.files[0] ? this.files[0].name : "Nenhum arquivo selecionado";
    document.querySelector('.file-name').textContent = fileName;
};
</script>

<?php include '../includes/footer.php'; ?>