<?php    
    
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '123456';
    $dbname = 'book';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

    function verificaAluguel($codlivro, $conexao){
        $sql = (" SELECT liv_codigo FROM aluga WHERE liv_codigo = '$codlivro' ");
        $resultados = mysqli_query($conexao, $sql);
        $i = 0;
        while (mysqli_fetch_assoc($resultados)) {
            $i++;  
        }

        return $i;
    }

    function buscaLivro($codlivro, $conexao) {
        $sqlBusca = "SELECT l.* FROM livro l  
        WHERE l.liv_ativo <>'N' AND liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($resultado);
        
    }
?>