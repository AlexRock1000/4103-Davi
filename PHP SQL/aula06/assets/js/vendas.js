document.addEventListener('DOMContentLoaded', function() {
    // Adiciona primeiro produto automaticamente
    if (document.getElementById('produtos-container').children.length === 0) {
        adicionarProduto();
    }
});

function calcularTotal() {
    let total = 0;
    document.querySelectorAll('.produto-item').forEach(item => {
        const preco = parseFloat(item.querySelector('.preco-unitario').value) || 0;
        const quantidade = parseFloat(item.querySelector('[name$="[quantidade]"]').value) || 0;
        total += preco * quantidade;
    });
    document.getElementById('total-venda').textContent = total.toFixed(2);
}