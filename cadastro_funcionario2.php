<?php

    include "bancodados/usuario.php";

    $cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $celular = filter_input (INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $usuario = filter_input (INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $dadosCadastro = array();
    $dadosCadastro['usu_cpf']       = $cpf;
    $dadosCadastro['usu_nomusu']    = $nome;
    $dadosCadastro['usu_celular']   = $celular;
    $dadosCadastro['usu_email']     = $email;
    $dadosCadastro['usu_login']     = $usuario;
    $dadosCadastro['usu_senha']     = $senha; 

    $ok = cadastrarUsuario($dadosCadastro, $conexao);
    if($ok){
        echo " <script> alert('Usuário cadastrado com sucesso!'); </script>";
		echo " <script> window.location.replace('login_cliente.php'); </script>";
    }else{
        echo " <script> alert('Erro ao cadastrar! Tente Novamente'); </script>";
		echo " <script> window.location.replace('cadastro_funcionario.php'); </script>";
    }

?>