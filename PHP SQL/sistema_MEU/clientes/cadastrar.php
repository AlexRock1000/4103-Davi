<section class="section">
    <div class="container">
        <h1 class="title">Cadastrar Novo Cliente</h1>
        
        <form method="POST" action="">
            <div class="field">
                <label class="label">Responsável</label>
                <div class="control">
                    <input class="input" type="text" name="responsavel" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Nome Fantasia</label>
                <div class="control">
                    <input class="input" type="text" name="nome_fantasia" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tipo</label>
                <div class="control">
                    <div class="select">
                        <select name="tipo" required>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Documento</label>
                <div class="control">
                    <input class="input" type="text" name="documento" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Endereço</label>
                <div class="control">
                    <input class="input" type="text" name="endereco" required>
                </div>
            </div>
            
            <div class="field">
                <label class="label">Telefone</label>
                <div class="control">
                    <input class="input" type="text" name="telefone" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="email" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>