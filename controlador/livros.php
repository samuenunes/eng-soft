<?php 
    

    function cadastrarLivro($dadosCadastro, $conexao){
        include_once "bancodados/conexao.php";
       $ok = cadastroLivro($dadosCadastro, $conexao);

       return $ok;
    }

?>