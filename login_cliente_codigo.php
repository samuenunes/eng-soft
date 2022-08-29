<?php
    include "login_cliente.php";

    $pass = $_POST['senha'];
    $user = $_POST['user'];
    $ok = False;
    if ((isset($user) && $user != '') && (isset($pass) && $pass != '')){
        $dadosLogin = array();
       
        include_once "bancodados/usuario.php";

        $dadosLogin['usuario'] = $user;
        $dadosLogin['pass'] = $pass;
        
        $ok = logar($dadosLogin, $conexao);

       if($ok){
            header('Location: home.php');
       }else{
            echo " <script> alert('Usuário ou Senha incorretos! '); </script>";
		    echo " <script> window.location.replace('login_cliente.php'); </script>";
       }
    }
?>