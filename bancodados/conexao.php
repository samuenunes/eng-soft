<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '123456';
    $dbname = 'book';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);



    function cadastroLivro($dados, $conexao){
        $titulo = $dados['titulo'];
        $autor = $dados['autor'];
        $autor2 = $dados['autor2'];
        $edicao = $dados['edicao'];
        $editora = $dados['editora'];
        $estoque = $dados['estoque'];
        $precob = $dados['preco'];

        $sql = (" INSERT INTO livro (liv_titulo, liv_autor, liv_autor2, liv_edicao, liv_editora, liv_preco, qtd_estoque)
                VALUES('$titulo', '$autor', '$autor2', '$edicao', '$editora', '$precob', '$estoque') ");
    
        $ok = mysqli_query($conexao, $sql);
   
        return $ok;
    }

    function buscaLivros($localizar, $conexao){

        $where = '';
        if($localizar != '' && $localizar != null){
            $where = "AND (l.liv_codigo like '%$localizar' OR l.liv_titulo like '%$localizar' OR l.liv_autor like '%$localizar' )";
        }
        $sql = ("SELECT l.* FROM livro l 
        WHERE l.liv_ativo <>'N' $where ");
        
        $resultados = mysqli_query($conexao, $sql);
        $lista = array();

        while ($aux = mysqli_fetch_assoc($resultados)) {
            $lista[] = $aux;
        }

        return $lista;
    }

    function buscaLivrosDisp($localizar, $conexao){

        $where = '';
        if($localizar != '' && $localizar != null){
            $where = "AND (l.liv_codigo like '%$localizar' OR l.liv_titulo like '%$localizar' OR l.liv_autor like '%$localizar' )";
        }
        $sql = ("SELECT l.* FROM livro l 
        WHERE l.liv_ativo <>'N' AND l.qtd_estoque > 0 $where ");
        
        $resultados = mysqli_query($conexao, $sql);
        $lista = array();

        while ($aux = mysqli_fetch_assoc($resultados)) {
            $lista[] = $aux;
        }

        return $lista;
    }

    function buscaLivro($codlivro, $conexao) {
        $sqlBusca = "SELECT l.* FROM livro l  
        WHERE l.liv_ativo <>'N' AND liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($resultado);
        
    }

    function editar($dados, $conexao){
        
        $codigo =   $dados['codigo'];
        $titulo =   $dados['titulo'];
        $autor =    $dados['autor'];
        $autor2 =   $dados['autor2'];
        $edicao =   $dados['edicao'];
        $editora =  $dados['editora'];
        $estoque =  $dados['estoque'];
        $preco =    $dados['preco'];

        $sql = (" UPDATE livro 
            SET liv_titulo  = '$titulo',  
                liv_autor   = '$autor',  
                liv_autor2  = '$autor2',  
                liv_edicao  = '$edicao', 
                liv_editora = '$editora', 
                qtd_estoque = '$estoque', 
                liv_preco   = '$preco'
                WHERE liv_codigo = '$codigo' AND liv_titulo = '$titulo' AND liv_autor = '$autor' AND  liv_edicao = '$edicao' ");
    
        $ok = mysqli_query($conexao, $sql);

        return $ok;
    }

    function desativarLivro($dadosCadastro, $conexao){
        
        $codlivro = $dadosCadastro['liv_codigo'];

        if(!verificaLivro($dadosCadastro, $conexao)){
            return false;
        }

        $sql = "UPDATE livro SET liv_ativo = 'N' WHERE liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sql);
        
        return $resultado;

    }

    function verificaLivro($codlivro, $conexao){
        //$sql = "SELECT *  FROM aluguel WHERE liv_codliv = $codlivro AND alu_datdev = '' ";
        //$resultado = mysqli_query($conexao, $sql);
       // $ok = mysqli_fetch_assoc($resultado);
       $ok = true;
        return $ok;
    }

?>
