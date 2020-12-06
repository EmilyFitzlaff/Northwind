<?php
    $title = "Cadastrar Região";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {
        include_once('class/class_region.php');
        include_once('layout/menu.php');
?>

<div class="container">
    <h1>Cadastrar Região</h1>
    <?php
        
        $oRegiao = new Region;
        $oRegiao->CreateForm(); 
        
        if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
            try {
                $oRegiao->InsertRegion($_POST['descricaoRegiao']);
                ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                        Região cadastrada com sucesso!
                    </div>
                <?php
            } catch (PDOException $erro) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <p>Ocorreu um erro inesperado, entre em contato com o suporte.</p> 
                    </div>
                <?php
                    echo "<em>Erro: {$erro->getMessage()}</em>";           
            }
        }
    ?>
</div>

<?php } ?>