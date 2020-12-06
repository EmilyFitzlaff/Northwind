<?php
    $title = "Excluir Categoria";
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
        $stmt = Conexao::Conectar()->prepare("SELECT * 
                                                FROM categories 
                                               WHERE category_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    $oCategoria = new Categoria();
    $oCategoria->DeletarCategoria($_GET['registro']);
?>
    <h1 class="titulo-principal">Tem certeza que seja excluir o registro abaixo?</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nomeCategoria">Nome da Categoria</label>
            <input type="text"  class="form-control" id="nomeCategoria" name="nomeCategoria" value="<?php echo $resultado[0]['category_name']?>" disabled>
        </div>
        
        <button type="submit" class="btn btn-danger" value="excluir" name="excluir">Excluir</button>
    </form>
</div>

<?php } ?>