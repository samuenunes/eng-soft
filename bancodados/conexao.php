<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '123456';
$dbname = 'livro';
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);



function cadastroLivro($dados, $conexao){
    $titulo = $dados['titulo'];
    $autor = $dados['autor'];
    $autor2 = $dados['autor2'];
    $edicao = $dados['edicao'];
    $editora = $dados['editora'];
    $estoque = $dados['estoque'];
    $precob = $dados['preco'];

    $sql = (" INSERT INTO livro (liv_titulo, liv_autor, liv_autor2, liv_edicao, liv_editora, liv_preco)
            VALUES('$titulo', '$autor', '$autor2', '$edicao', '$editora', '$precob') ");
   
   $ok = mysqli_query($conexao, $sql);

   /*if($ok){
    $sqlEstoque = (" INSERT INTO estoque (liv_codigo, liv_titulo, qtd_estoque)
        ((SELECT liv_codigo, liv_titulo FROM livro WHERE liv_titulo = $titulo 
            AND liv_autor = $autor AND liv_edicao = $edicao AND liv_editora = $editora AND liv_preco = $precob), '$estoque') ");

    $ok = mysqli_query($conexao, $sqlEstoque);

   }*/
    //echo $sql;
    return $ok;
}

?>
