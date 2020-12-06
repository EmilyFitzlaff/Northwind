<?php
    /**
     * Neste arquivo estão as funções que serão utilizadas em diversas classes do sistema.
     */
    
    /**
     * @return INT retorna o código do último elemento cadastrado no BD
     */
    function getMaxID($id_coluna, $nome_tabela) {
        $consulta = Conexao::Conectar()->query("SELECT MAX($id_coluna) 
                                                  FROM $nome_tabela");

        $max = $consulta->fetch(PDO::FETCH_ASSOC);

        return $max['max'];
    }

    /**
     * @return STRING 
     */
    function mensagemIntegridadeBD() {
        return "Este registro não pode ser excluído pois está vinculado à outro e isso violará uma regra de integradade definida no banco de dados!";
    }

    /**
     * @return HTML texto contendo informações sobre o acesso negado e redirecionamento ao index
     */

    function AcessoNegado() {
        ?>
        <div class="container" style="margin: 10px;">
            <div class="card-body">
                <h5 class="card-title text-danger">ACESSO NEGADO!</h5>
                <p class="card-text">Para acessar esta página é necessário que o usuário esteja logado.</p>
                <a href="index.php" class="btn btn-primary">EFETUAR LOGIN</a>
            </div>
        </div>
        <?php
    }
?>