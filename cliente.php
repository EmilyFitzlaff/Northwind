<?php
    $title = "Consultar Clientes";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {
        include_once('class/class_cliente.php');
        include_once('layout/menu.php');    
?>

<div class="container">
    <h1 class="titulo-principal"><?php echo $title; ?></h1>
    <p>Clique sobre o nome do cliente para visualizar mais informações!</p>

    <?php
        $oCliente = new Cliente;
        $oCliente->CreateConsulta();
    ?>
</div>

<?php } ?>