<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

$title = "Lista de Produtos";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1 class="title">Produtos Cadastrados</h1>
            </div>
            <div class="level-right">
                <a href="cadastrar.php" class="button is-primary">
                    <i class="fas fa-plus"></i>&nbsp; Novo Produto
                </a>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th>Valor Venda</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>R$ </td>
                        <td>
                            
                                <img src="#" alt="Imagem do produto" class="image is-48x48 is-rounded ">
                          
                            <span class="tag is-light">Sem imagem</span>
                        
                        </td>
                        <td>
                            <div class="buttons are-small">
                                <a href="#" 
                                   class="button is-info" 
                                   title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" 
                                   class="button is-warning" 
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" 
                                   class="button is-danger" 
                                   title="Excluir"
                                   onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>