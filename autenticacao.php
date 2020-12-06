<?php

    session_start();

    $title = "Autenticação";

    include_once('class/class_connection.php');
    include_once('config/functions.php');
    include_once('layout/header.php');

    if(isset($_POST['acao']) && $_POST['acao'] == 'entrar') {
        $sql = "SELECT * 
                  FROM usuario 
                 WHERE codigo = {$_POST['login']} 
                   AND senha = '{$_POST['senha']}'"; 

        $stmt = Conexao::Conectar()->prepare($sql);                

        $stmt->execute();
        
        $result = $stmt->fetchAll();      
    
        if($_POST['login'] == isset($result[0]['login'])) {
            $_SESSION['usuariologado'] = true;
            header('location:home.php'); 
        } else {
            header('location: index.php?login=erro');
            $_SESSION['usuariologado'] = false;
        }      
   }
?>