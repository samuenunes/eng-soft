<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '123456';
    $dbname = 'livro';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);



    function cadastroCliente($dados, $conexao){
        $cpf = $dados['cpf'];
        $nome = $dados['nome'];
        $celular = $dados['celular'];
        $telefone = $dados['telefone'];
        $rua = $dados['rua'];
        $numero = $dados['numero'];
        $bairro = $dados['bairro'];
        $complemento = $dados['complemento'];
        $cidade = $dados['cidade'];
        $estado = $dados['estado'];

        $sql = (" INSERT INTO cliente (cli_cpf, cli_nomcli, cli_celular, cli_phone, cli_rua, cli_numend, cli_bairro,
        cli_compl, cli_cidade, cli_estado)
                VALUES('$cpf', '$nome', '$celular', '$telefone', '$rua', '$numero', '$bairro', '$complemento', 
                '$cidade', '$estado') ");
    
        $ok = mysqli_query($conexao, $sql);
   
        return $ok;
    }

    function buscaClientes($localizar, $conexao){

        $where = '';
        if($localizar != '' && $localizar != null){
            $where = "AND (c.cli_codigo like '%$localizar' OR c.cli_nomcli like '%$localizar' OR c.cli_cpf like '%$localizar' )";
        }
        $sql = ("SELECT c.* FROM cliente c 
        WHERE c.cli_ativo <>'N' $where ");
        
        $resultados = mysqli_query($conexao, $sql);
        $lista = array();

        while ($aux = mysqli_fetch_assoc($resultados)) {
            $lista[] = $aux;
        }

        return $lista;
    }

    function buscaCliente($codlivro, $conexao) {
        $sqlBusca = "SELECT l.* FROM livro l  
        WHERE l.liv_ativo <>'N' AND liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($resultado);
        
    }

    function editarrr($dados, $conexao){
        
        $codigo =   $$dados['codigo'];
        $titulo =   $$dados['titulo'];
        $autor =    $$dados['autor'];
        $autor2 =   $$dados['autor2'];
        $edicao =   $$dados['edicao'];
        $editora =  $$dados['editora'];
        $estoque =  $$dados['estoque'];
        $preco =    $$dados['preco'];

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

    function desativarCliente($dadosCadastro, $conexao){
        
        $codlivro = $$dadosCadastro['liv_codigo'];

        if(!verificaLivro($$dadosCadastro, $conexao)){
            return false;
        }

        $sql = "UPDATE livro SET liv_ativo = 'N' WHERE liv_codigo = '$codlivro' ";
        $resultado = mysqli_query($conexao, $sql);
        
        return $resultado;

    }

    function verificaCliente($codlivro, $conexao){
        //$sql = "SELECT *  FROM aluguel WHERE liv_codliv = $codlivro AND alu_datdev = '' ";
        //$resultado = mysqli_query($conexao, $sql);
       // $ok = mysqli_fetch_assoc($resultado);
       $ok = true;
        return $ok;
    }

?>
