<?php
    //$request = $_POST['liv_codigo'];
    if(isset($_POST['liv_codigo'])){

       return calculaPreco();
    }

    function calculaPreco(){
       
        $livro = buscaLivroNew($_POST['liv_codigo']);
        $precoBase = $livro['liv_preco'];

        $quantidade = verificaAluguel($_POST['liv_codigo']);
        if($quantidade > 0){
            $preco = ((($precoBase * $quantidade) / 1000) + $precoBase);
            echo $preco;
        }else{
            echo $precoBase;
        }
    }
    

    function verificaAluguel($codlivro){

        $conexao = mysqli_connect("localhost", "root", "123456", "book");
        $sql = (" SELECT liv_codigo FROM aluguel WHERE liv_codigo = '$codlivro' ");
        $resultados = mysqli_query($conexao, $sql);
        $i = 0;
        while (mysqli_fetch_assoc($resultados)) {
            $i++;  
        }

        return $i;
    }

    function buscaLivroNew($codlivro){

        $conexao = mysqli_connect("localhost", "root", "123456", "book");
        $sqlBusca = "SELECT l.* FROM livro l  
        WHERE l.liv_ativo <>'N' AND liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($resultado); 
    }
   

?>