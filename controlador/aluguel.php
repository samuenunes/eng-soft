<?php 
    function alugarLivro($dadosCadastro, $conexao){
        include_once "bancodados/aluga.php";
       $ok = aluga($dadosCadastro, $conexao);

       return $ok;
    }

    function buscaAluguel($codigo, $conexao){
        include_once "bancodados/aluga.php";
       $ok = buscarAluguel($codigo, $conexao);

       return $ok;
    }

    function buscaAlugueis($codigo, $conexao){
        include_once "bancodados/aluga.php";
       $ok = buscarAlugueis($codigo, $conexao);

       return $ok;
    }

    function devolverLivro($dadosCadastro, $conexao){
        include_once "bancodados/aluga.php";
       $ok = devolve($dadosCadastro, $conexao);

       return $ok;
    }

?>