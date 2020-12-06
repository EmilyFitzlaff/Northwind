<?php

    /**
     * @var Connection classe para conexão com o banco de dados
     */
    Class Conexao extends PDO {
        public static function Conectar() {
            $user = "postgres";
            $password = 123;
            $host = "localhost";
            $port = 5433;
            $dbname = "northwind";
            
            $connection = new PDO("pgsql:host={$host}; 
                                         port={$port}; 
                                         dbname={$dbname}; 
                                         user={$user}; 
                                         password={$password}");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
    }

    function executeQuery($sql) {
        $stmt = Conexao::Conectar()->prepare($sql);
        return $stmt->execute();
    }
?>