<?php
    $title = "Alterar Território";
    include_once('config/functions.php');
    include_once('layout/header.php');

    session_start();

    if($_SESSION['usuariologado'] == false) {
        AcessoNegado();
        $title = "Acesso Negado";
    } else {
        include_once('class/class_territory.php');  
        include_once('class/class_region.php');    
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

    if(isset($_POST['nomeTerritorio'])) {
        $oTerritorio = new Territory();
        $oTerritorio->AlterarTerritorio($_GET['registro'], $_POST['nomeTerritorio'], $_POST['regiao']);
    }
?>
    <h1 class="titulo-principal"><?php echo $title; ?></h1>
    <form method="POST">
        <div class="form-group">
            <label for="nomeTerritorio">Território</label>
            <input type="text"  class="form-control" id="nomeTerritorio" name="nomeTerritorio" value="<?php echo $resultado[0]['territory_description']?>">
        </div>
        <div class="form-group">
            <?php 
                $oRegiao = new Region;
                $aDados = $oRegiao->returnSelectAll();
            ?>
            <label for='regiao'>Região</label>
            <select name='regiao' class='form-control'>
            <?php
                foreach ($aDados as $oObjeto){
                    if($oObjeto->getCodigo() == $_GET['regiao']) {
                        echo "<option value='{$oObjeto->getCodigo()}' selected>{$oObjeto->getNome()}</option>";
                    } else {
                        echo "<option value='{$oObjeto->getCodigo()}'>{$oObjeto->getNome()}</option>";
                    }
                }
            ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
    </form>    
</div>

<?php } ?>