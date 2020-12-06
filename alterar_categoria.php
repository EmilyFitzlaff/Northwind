<?php
    $title = "Alterar Categoria";
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
<?php     
    if (isset($_GET['registro'])) {
        $stmt = Conexao::Conectar()->prepare("SELECT * FROM categories WHERE category_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    if(isset($_POST['nomeCategoria']) || isset($_POST['descricaoCategoria'])) {
        $oCategoria = new Categoria();
        $oCategoria->AlterarCategoria($_GET['registro'], $_POST['nomeCategoria'], $_POST['descricaoCategoria']);
    }
?>
    <h1 class="titulo-principal"><?php echo $title; ?></h1>
    <form method="POST">
        <div class="form-group">
            <label for="nomeCategoria">Nome da Categoria</label>
            <input type="text"  class="form-control" id="nomeCategoria" name="nomeCategoria" value="<?php echo $resultado[0]['category_name']?>">
        </div>
        <div class="form-group">
            <label for="descricaoCategoria">Descrição da Categoria</label>
            <input type="text"  class="form-control" id="descricaoCategoria" name="descricaoCategoria" value="<?php echo $resultado[0]['category_description']?>">
        </div>
        
        <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
    </form>    
</div>

<?php } ?>