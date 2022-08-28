<?php 
    function cadastrarCliente($dadosCadastro, $conexao){
        include_once "bancodados/cliente.php";
       $ok = cadastroCliente($dadosCadastro, $conexao);

       return $ok;
    }

    function buscarClientes($localizar, $conexao){
        include_once "bancodados/cliente.php";
       $lista = buscaClientes($localizar, $conexao);

       return $lista;
    }

    function buscarCliente($codcli, $conexao){
        include_once "bancodados/cliente.php";
       $lista = buscaCliente($codcli, $conexao);

       return $lista;
    }

    function editarCliente($dadosCadastro, $conexao){
        include_once "bancodados/cliente.php";
       $ok = editarCli($dadosCadastro, $conexao);

       return $ok;
    }

    function desativaCliente($dadosCadastro, $conexao){
        include_once "bancodados/cliente.php";
       $ok = desativarCliente($dadosCadastro, $conexao);

       return $ok;
    }
?>