<?php
    $title = "Consultar Transportadoras";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {
        include_once('class/class_shipper.php');
        include_once('layout/menu.php');
?>

<div class="container">
    <h1 class="titulo-principal"><?php echo $title; ?></h1>

    <?php
        $oTransportadora = new Shipper;
        $oTransportadora->CreateTable();
    ?>
</div>

<?php } ?>