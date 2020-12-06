<?php
    $title = "Alterar Região";
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
        $stmt = Conexao::Conectar()->prepare("SELECT * FROM region WHERE region_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    if(isset($_POST['nomeRegiao'])) {
        $oRegiao = new Region();
        $oRegiao->AlterarRegiao($_GET['registro'], $_POST['nomeRegiao']);
    }
?>
    <h1 class="titulo-principal"><?php echo $title; ?></h1>
    <form method="POST">
        <div class="form-group">
            <label for="nomeRegiao">Região</label>
            <input type="text"  class="form-control" id="nomeRegiao" name="nomeRegiao" value="<?php echo $resultado[0]['region_description']?>">
        </div>
        
        <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
    </form>    
</div>

<?php } ?>