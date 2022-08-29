<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '123456';
    $dbname = 'book';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

    function cadastrarUsuario($dados, $conexao){
        
        $cpf = $dados['usu_cpf'];
        $nome = $dados['usu_nomusu'];
        $celular = $dados['usu_celular'];
        $email = $dados['usu_email'];
        $usuario = $dados['usu_login'];
        $senha = $dados['usu_senha'];

        $sql = "INSERT INTO usuario (usu_cpf, usu_nomusu, usu_celular, usu_email, usu_login, usu_senha) 
            VALUES ('$cpf', '$nome', '$celular', '$email', '$usuario', MD5('$senha'))";
        $ok = mysqli_query($conexao, $sql); 

        return $ok;
    }

    function logar($dados, $conexao){
        
        $usuario = $dados['usuario'];
        $pass = $dados['pass'];
    
        $sql = (" SELECT usu_codusu FROM usuario WHERE usu_login = '$usuario' AND usu_senha = MD5('$pass') ;");
        $exec = mysqli_query($conexao, $sql);
        $result = mysqli_fetch_assoc($exec);
        if($result['usu_codusu'] != ''){
            return True;
        }
        
        return False;
        
    }

?>