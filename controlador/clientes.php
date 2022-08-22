<?php 
    function cadastrarCliente($dadosCadastro, $conexao){
        include_once "bancodados/cliente.php";
       $ok = cadastroCliente($dadosCadastro, $conexao);

       return $ok;
    }

    function buscarClientes($localizar, $conexao){
        include_once "bancodados/conexao.php";
       $lista = buscaClientes($localizar, $conexao);

       return $lista;
    }

    function buscarCliente($codlivro, $conexao){
        include_once "bancodados/conexao.php";
       $lista = buscaCliente($codlivro, $conexao);

       return $lista;
    }

    function editarCliente($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = editar($dadosCadastro, $conexao);

       return $ok;
    }

    /*function desativarCliente($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = editar($dadosCadastro, $conexao);

       return $ok;
    }*/
?>