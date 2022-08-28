<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '123456';
    $dbname = 'book';
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

    function buscaCliente($codigo, $conexao) {
        $sqlBusca = "SELECT c.* FROM cliente c  
        WHERE c.cli_ativo <>'N' AND cli_codigo = '$codigo' ";
        $resultado = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($resultado);
        
    }

    function editarCli($dados, $conexao){
        
        $codigo =       $dados['codigo'];
        $cpf =          $dados['cpf'];
        $nome =         $dados['nome'];
        $celular =      $dados['celular'];
        $telefone =     $dados['telefone'];
        $rua =          $dados['rua'];
        $numero =       $dados['numero'];
        $bairro =       $dados['bairro'];
        $complemento =  $dados['complemento'];
        $cidade =       $dados['cidade'];
        $estado =       $dados['estado'];

        $sql = (" UPDATE cliente 
            SET cli_cpf =       '$cpf',  
                cli_nomcli =    '$nome',  
                cli_celular =   '$celular', 
                cli_phone =     '$telefone', 
                cli_rua =       '$rua', 
                cli_numend =    '$numero', 
                cli_bairro =    '$bairro', 
                cli_compl =     '$complemento',
                cli_cidade =    '$cidade',
                cli_estado =    '$estado'
                WHERE cli_codigo = '$codigo' AND cli_cpf = '$cpf' ");
    
        $ok = mysqli_query($conexao, $sql);

        return $ok;
    }

    function desativarCliente($dadosCadastro, $conexao){
        
        $clicodigo = $dadosCadastro['cli_codigo'];

        if(!verificaCliente($dadosCadastro, $conexao)){
            return false;
        }

        $sql = "UPDATE cliente SET cli_ativo = 'N' WHERE cli_codigo = '$clicodigo' ";
        $resultado = mysqli_query($conexao, $sql);
        
        return $resultado;

    }

    function verificaCliente($clicodigo, $conexao){
        //$sql = "SELECT *  FROM aluguel WHERE liv_codliv = $clicodigo AND alu_datdev = '' ";
        //$resultado = mysqli_query($conexao, $sql);
       // $ok = mysqli_fetch_assoc($resultado);
       $ok = true;
        return $ok;
    }

?>
