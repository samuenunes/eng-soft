<?php
 session_start();
include "cadastroLivro.php";
include "bancodados/conexao.php";
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $autor2 = $_POST['autor2'];
    $edicao = $_POST['edicao'];
    $editora = $_POST['editora'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['precob'];

    if ((isset($titulo) && $titulo != '') && (isset($autor) && $autor != '') &&
        (isset($edicao) && $edicao != '') && (isset($editora) && $editora != '') &&
        (isset($estoque) && $estoque > 0) && (isset($preco) && $preco > 0)){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['titulo'] = $titulo;
        $dadosCadastro['autor'] = $autor;
        if(isset($autor2) && $autor2 != ''){
            $dadosCadastro['autor2'] = $autor2;
        }
        $dadosCadastro['edicao'] = $edicao;
        $dadosCadastro['editora'] = $editora;
        $dadosCadastro['estoque'] = $estoque;
        $dadosCadastro['preco'] = $preco;

        include_once "controlador/clientes.php";

       $ok = cadastrarCliente($dadosCadastro, $conexao);

       if($ok){
        header('Location: sucessoLivro.php');
       }else{
        echo "Dados inseridos incorretamente. Tente novamente.";
       }
    }
    
    //include_once("conexao.php");

    //echo "titulo: $titulo <br>";
   // echo "autor: $autor <br>";
    //echo "autor2: $autor2 <br>";
   // echo "edicao: $edicao <br>";
    //echo "editora: $editora <br>";
   // echo "estoque: $estoque <br>";
   // echo "precob: $precob <br>";

   // $result_livro = "INSERT INTO cadastro_livro (titulo, autor, autor2, edicao, editora, estoque, precob) VALUES ('$titulo', '$autor', '$autor2', '$edicao', '$editora', '$estoque', '$precob')";
   // $result_livro = mysqli_query($conn, $result_livro);
?>