<?php
    $title = "Cadastrar Categoria";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {        
        include_once('class/class_categoria.php');
        include_once('layout/menu.php');
?>

<div class="container">
    <h1>Cadastrar Categoria</h1>
    <?php
        
        $oCategoria = new Categoria;
        $oCategoria->CreateForm(); 
        
        if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
            try {
                $oCategoria->InsertCategoria($_POST['nomeCategoria'], $_POST['descricaoCategoria']);
                ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                        Categoria cadastrada com sucesso!
                    </div>
                <?php
            } catch (PDOException $erro) {
                ?>
                    <br>
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