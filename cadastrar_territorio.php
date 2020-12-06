<?php
    $title = "Cadastrar Território";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {
        include_once('class/class_territory.php');
        include_once('layout/menu.php');
?>

<div class="container">
    <h1><?php echo $title; ?></h1>
    <?php
        
        $oTerritorio = new Territory;
        $oTerritorio->CreateForm(); 
    
        if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
            try {
                $oTerritorio->InsertTerrority($_POST['descricaoTerritorio'], $_POST['regiao']);
                ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                        Território cadastrado com sucesso!
                    </div>
                <?php
            } catch (PDOException $erro) {
                ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <span>Ocorreu um erro inesperado, entre em contato com o suporte.</span> 
                    </div>
                <?php
                    echo "<em>Erro: {$erro->getMessage()}</em>";           
            }
        }
    ?>
</div>

<?php } ?>