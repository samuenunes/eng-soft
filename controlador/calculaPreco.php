<?php
    include "/bancodados/util.php";
    $request = $_POST['liv_codigo'];
    if(isset($request)){
        return calculaPreco();
    }

    function calculaPreco(){

        $livro = buscaLivro($request, $conexao);
        $precoBase = $livro['liv_preco'];

        $quantidade = verificaAluguel($request, $conexao);
        if($quantidade > 0){
            $preco = ((($precoBase * $quantidade) / 1000) + $precoBase);
            echo $preco; 
        }else{
            echo $precoBase;
        }
    }
    //echo $request;
   

?>