<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';
checklogin();

$title = "Dashboard";
include 'includes/header.php';
include 'includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <h1 class="title">Dashboard</h1>
        
        <div class="columns">
            <!-- Últimos Clientes -->
            <div class="column">
                <div class="box">
                    <h2 class="subtitle">Últimos Clientes Cadastrados</h2>
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Documento</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Últimas Vendas -->
            <div class="column">
                <div class="box">
                    <h2 class="subtitle">Últimas Vendas</h2>
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td> </td>
                                <td>R$  </td>
                                <td> </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>