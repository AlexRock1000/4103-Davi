<section class="section">
    <div class="container">
        <h1 class="title">Registrar Nova Venda</h1>
        
        <form method="POST" id="formVenda">
            <div class="field">
                <label class="label">Cliente *</label>
                <div class="select is-fullwidth">
                    <select name="cliente_id" required>
                        <option value="">Selecione um cliente</option>
                        
                        <option value="#"> </option>

                    </select>
                </div>
            </div>

            <h3 class="subtitle">Produtos</h3>
            <div id="produtos-container" class="mb-4">
                <!-- Itens serão adicionados via JavaScript -->
            </div>

            <div class="field">
                <button type="button" class="button is-info" onclick="adicionarProduto()">
                    <i class="fas fa-plus"></i>&nbsp; Adicionar Produto
                </button>
            </div>

            <div class="field">
                <div class="box">
                    <h4 class="title is-5">Total da Venda: R$ <span id="total-venda">0,00</span></h4>
                </div>
            </div>

            <div class="field">
                <button type="submit" class="button is-primary">
                    <i class="fas fa-save"></i>&nbsp; Salvar Venda
                </button>
            </div>
        </form>
    </div>
</section>

<script>
const produtosDisponiveis = <?= json_encode($produtos) ?>;

function adicionarProduto() {
    const container = document.getElementById('produtos-container');
    const index = container.children.length;

    const html = `
    <div class="box produto-item">
        <div class="field">
            <label class="label">Produto *</label>
            <div class="select is-fullwidth">
                <select name="produtos[${index}][id]" required 
                        onchange="atualizarPreco(this, ${index})">
                    <option value="">Selecione</option>
                    ${produtosDisponiveis.map(p => `
                        <option value="${p.id}" 
                            data-preco="${p.valor_venda}"
                            data-estoque="${p.quantidade}">
                            ${p.nome} (Estoque: ${p.quantidade})
                        </option>
                    `).join('')}
                </select>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Quantidade *</label>
                    <input type="number" name="produtos[${index}][quantidade]" 
                           class="input" min="1" value="1" required
                           onchange="calcularTotal()">
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Preço Unitário</label>
                    <input type="number" step="0.01" 
                           name="produtos[${index}][preco]" 
                           class="input preco-unitario" readonly>
                </div>
            </div>
        </div>

        <button type="button" class="button is-danger is-small" 
                onclick="this.parentElement.remove(); calcularTotal()">
            <i class="fas fa-times"></i>&nbsp; Remover
        </button>
    </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

function atualizarPreco(select, index) {
    const preco = select.options[select.selectedIndex].dataset.preco;
    const estoque = select.options[select.selectedIndex].dataset.estoque;
    
    document.querySelectorAll('.preco-unitario')[index].value = preco;
    document.querySelectorAll('[name="produtos[' + index + '][quantidade]"]')[0].max = estoque;
    calcularTotal();
}

function calcularTotal() {
    let total = 0;
    document.querySelectorAll('.produto-item').forEach(item => {
        const preco = parseFloat(item.querySelector('.preco-unitario').value) || 0;
        const quantidade = parseFloat(item.querySelector('input[type="number"]').value) || 0;
        total += preco * quantidade;
    });
    document.getElementById('total-venda').textContent = total.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Adiciona primeiro item automaticamente
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('produtos-container').children.length === 0) {
        adicionarProduto();
    }
});
</script>

<?php include '../includes/footer.php'; ?>