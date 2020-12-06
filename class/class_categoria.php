<?php
    require_once('class_connection.php');

    /**
     * @var Categoria classe contendo os atributos de transportadora
     */
    class Categoria {
        private $codigo;
        private $nome;
        private $descricao;

        public function getCodigo() {
            return $this->codigo;
        }
        
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        /**
         * @return Array retorna em um array todas as informações do banco de dados
         */
        private function SelectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT * FROM categories");
            $consulta->execute();

            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oCategoria = new Categoria;
                $oCategoria->setCodigo($aLinha['category_id']);
                $oCategoria->setNome($aLinha['category_name']);
                $oCategoria->setDescricao($aLinha['category_description']);
                $aResultado[] = $oCategoria;
            }
            return $aResultado;  
        }

        public function returnSelectAll() {
            $aDados = $this->SelectAll();
            return $aDados;
        }

        public function CreateTable() {
            $aDados = $this->SelectAll();

            if (empty($aDados)) {
            ?>
                <div class="alert alert-secondary" role="alert">
                    <p>Não há dados para exibição!</p>
                </div>
            <?php
            } else {
                ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%">Código</th>
                            <th style="width: 20%">Nome</th>
                            <th style="width: 30%">Descrição</th>
                            <th style="width: 15%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($aDados as $oObjeto) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $oObjeto->getCodigo();?></td>
                            <td><?php echo $oObjeto->getNome(); ?></td>
                            <td><?php echo $oObjeto->getDescricao(); ?></td>
                            <td>
                                <a href='alterar_categoria.php?acao=alterar&registro=<?php echo $oObjeto->getCodigo()?>' class="green">
                                    <span class="btn btn-outline-primary">Alterar 
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </span>
                                </a>                        
                                <a href='excluir_categoria.php?acao=deletar&registro=<?php echo $oObjeto->getCodigo()?>' class="red">
                                    <span class="btn btn-outline-danger">Excluir
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php 
            }
        }

        public function InsertCategoria($nome, $descricao) {
            $IDCategoria = getMaxID("category_id", "categories") +1;

            $sql = ("INSERT INTO categories (category_id,category_name, category_description) 
            VALUES ($IDCategoria, '". $nome ."', '". $descricao ."')");
         
            executeQuery($sql);   
        }

        public function CreateForm() {
            ?>
            <form method="POST">
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" id="nomeCategoria" placeholder="Informe o nome da categoria" name="nomeCategoria" required maxlength="15">
                </div>
                <div class="form-group">
                    <label for="descricaoCategoria">Descrição da Categoria</label>
                    <input type="text" class="form-control" id="descricaoCategoria" placeholder="Informe a descrição da categoria" name="descricaoCategoria" required>
                </div>
                <button type="submit" class="btn btn-primary" value="cadastrar" name="acaoCadastrar">Cadastrar</button>
            </form>
            <?php
        }

        public function DeletarCategoria($codigo) {
            if(isset($_POST['excluir'])) {
                try {
                    $sql = ("DELETE FROM categories WHERE category_id = {$codigo}");
                    executeQuery($sql);
        
                    if (!executeQuery($sql)){
                        throw new PDOException();
                    }
        
                   ?><br>
                    <div class="alert alert-success" role="alert">
                        <span>Registro excluído com sucesso!</span>
                    </div>
                    <?php
                    exit;
                   
                } catch(PDOException $erro) {
                    ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <span><?php echo mensagemIntegridadeBD(); ?></span>
                    </div>
                    <?php                    
                }
            }
        }

        public function AlterarCategoria($codigo, $name, $descricao){
            if(isset($_POST['alterar'])) {
                try {
                    $stmt = Conexao::Conectar()->prepare("UPDATE categories set category_name = '{$name}', category_description = '{$descricao}' WHERE category_id = {$codigo}");

                    $stmt->execute();

                    if (!$stmt->execute()){
                        throw new PDOException();
                    }

                    ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                        <span>Registro alterado com sucesso!</span>
                    </div>

                    <?php
                    exit;
                } catch(PDOException $erro) {
                    ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <span>Este registro não pode ser alterado.</span>
                    </div>
                    <?php
                }
            }
        }
    }
?>