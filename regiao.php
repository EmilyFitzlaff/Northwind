<?php
    $title = "Consultar Regiões";  
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {    
        include_once('layout/menu.php');
        include_once('class/class_region.php');
?>

<div class="container">
    <h1 class="titulo-principal"><?php echo $title; ?></h1>

    <?php
        $oRegiao = new Region;
        $oRegiao->CreateTable();
    ?>
</div>

<?php } ?>