<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

$title = "Lista de Clientes";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1 class="title">Clientes Cadastrados</h1>
            </div>
            <div class="level-right">
                <a href="cadastrar.php" class="button is-primary">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Novo Cliente</span>
                </a>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Responsável</th>
                        <th>Nome Fantasia</th>
                        <th>Documento</th>
                        <th>Cadastrado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>
                            <span class="tag is-info">
                                
                            </span>
                        </td>
                        <td> </td>
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
                                   onclick="return confirm('Tem certeza que deseja excluir este cliente?');">
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