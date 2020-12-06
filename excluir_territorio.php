<?php
    $title = "Excluir Território";
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
<?php     
    if (isset($_GET['registro'])) {
        $stmt = Conexao::Conectar()->prepare("SELECT * FROM territories WHERE territory_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    $oTerritorio = new Territory();
    $oTerritorio->DeletarTerritorio($_GET['registro']);
?>
    <h1 class="titulo-principal">Tem certeza que seja excluir o registro abaixo?</h1>
    <form method="POST">
        <div class="form-group">
            <label for="territorio_descricao">Território</label>
            <input type="text"  class="form-control" id="territorio_descricao" name="territorio_descricao" value="<?php echo $resultado[0]['territory_description']?>" disabled>
        </div>
        
        <button type="submit" class="btn btn-danger" value="excluir" name="excluir">Excluir</button>
    </form>
</div>

<?php } ?>