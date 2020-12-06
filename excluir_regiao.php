<?php
    $title = "Excluir Região";
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
<?php     
    if (isset($_GET['registro'])) {
        $stmt = Conexao::Conectar()->prepare("SELECT * 
                                                FROM region     
                                               WHERE region_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    $oRegiao = new Region();
    $oRegiao->DeletarRegiao($_GET['registro']);
?>
    <h1 class="titulo-principal">Tem certeza que seja excluir o registro abaixo?</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nomeRegiao">Região</label>
            <input type="text"  class="form-control" id="nomeRegiao" name="nomeRegiao" value="<?php echo $resultado[0]['region_description']?>" disabled>
        </div>
        
        <button type="submit" class="btn btn-danger" value="excluir" name="excluir">Excluir</button>
    </form>
</div>

<?php } ?>