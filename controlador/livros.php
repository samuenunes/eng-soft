<?php 
    

    function cadastrarLivro($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = cadastroLivro($dadosCadastro, $conexao);

       return $ok;
    }

    function buscarLivros($localizar, $conexao){
        include_once "bancodados/conexao.php";
       $lista = buscaLivros($localizar, $conexao);

       return $lista;
    }

    function buscarLivro($codlivro, $conexao){
        include_once "bancodados/conexao.php";
       $lista = buscaLivro($codlivro, $conexao);

       return $lista;
    }

    function editarLivroo($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = editar($dadosCadastro, $conexao);

       return $ok;
    }

    /*function desativarLivro($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = editar($dadosCadastro, $conexao);

       return $ok;
    }*/
?>