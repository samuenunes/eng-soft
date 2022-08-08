<?php
include "login_cliente.php";

    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    $ok = False;
    if ((isset($usuario) && $usuario != '') && (isset($senha) && $senha != '')){
        $dadosLogin = array();
        

        $dadosLogin['usuario'] = $usuario;
        $dadosLogin['senha'] = $senha;

       $ok = True; //logar($dadosLogin);

       if($ok){
        header('Location: home.php');
       }else{
        echo "Usuário ou Senha incorreto. Tente novamente.";
       }
    }
    else if(!$ok && isset($usuario)){
        echo "eroooooooooo";
    }
?>