<?php
    $title = "Alterar Transportadora";
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
<?php     
    if (isset($_GET['registro'])) {
        $stmt = Conexao::Conectar()->prepare("SELECT * FROM shippers WHERE shipper_id = :id");

        $stmt->bindParam(':id', $_GET['registro']);

        $stmt->execute();
        
        $resultado = $stmt->fetchAll();   
    }

    if(isset($_POST['descricaoTransportadora'])) {
        $oTransportadora = new Shipper();
        $oTransportadora->AlterarTransportadora($_GET['registro'], $_POST['descricaoTransportadora'], $_POST['telefone']);
    }
?>
    <h1 class="titulo-principal"><?php echo $title; ?></h1>
    <form method="POST">
        <div class="form-group">
            <label for="descricaoTransportadora">Transportadora</label>
            <input type="text"  class="form-control" id="descricaoTransportadora" name="descricaoTransportadora" value="<?php echo $resultado[0]['company_name']?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text"  class="form-control" id="telefone" name="telefone" value="<?php echo $resultado[0]['phone']?>">
        </div>
   
        <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
    </form>    
</div>

<?php } ?>