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

    function aluga($dados, $conexao){

        $liv_codigo = $dados['liv_codigo'];
        $cli_codigo = $dados['cli_codigo'];
        $preco = $dados['alu_preco'];
        $datini = $dados['alu_datini']; //implode("/",array_reverse(explode("-",$dados['alu_datini'])));
        $datfim = $dados['alu_datfim']; //implode("/",array_reverse(explode("-",$dados['alu_datfim'])));

        // Travando tabela
        mysqli_query($conexao, " LOCK TABLES aluguel WRITE ;");

        // pegando numero do aluguel a ser inserido
        $sqlNumAlu = ("SELECT auto_increment AS numero FROM information_schema.TABLES 
            WHERE TABLE_NAME = 'aluguel' AND TABLE_SCHEMA = 'book';");
        $ex =  mysqli_query($conexao, $sqlNumAlu);
        //$numAlu = mysqli_fetch_assoc($ex);

        //inserindo dados do aluguel
        $okk = False;
        $sql = (" INSERT INTO aluguel (liv_codigo, cli_cpf, alu_preco, alu_datini, alu_datfim)
                VALUES('$liv_codigo', '$cli_codigo', '$preco', '$datini', '$datfim') ");
    
        $ok = mysqli_query($conexao, $sql);
        mysqli_query($conexao, " UNLOCK TABLES;"); //destravando tabela
        if($ok){
            $okk = atualizaEstoque($liv_codigo, $conexao);
            if($okk){
                return mysqli_fetch_assoc($ex);
            }else{
                $ok = False;
            }
        }
   
        return $ok;
    }

    function buscarAluguel($codalu, $conexao){
        $sql = (" SELECT a.*, l.liv_titulo, c.cli_nomcli FROM aluguel a
        LEFT OUTER JOIN livro l ON (l.liv_codigo = a.liv_codigo AND l.liv_ativo <> 'N')
        LEFT OUTER JOIN cliente c ON (c.cli_cpf = a.cli_cpf AND c.cli_ativo <> 'N') 
        WHERE a.alu_codigo = '$codalu' AND ISNULL(alu_datdev) ");
        $ex = mysqli_query($conexao, $sql);
        return mysqli_fetch_assoc($ex);
    }

    function buscarAlugueis($localizar, $conexao){

        $where = '';
        if($localizar != '' && $localizar != null){
            $where = "AND (a.alu_codalu like '%$localizar' 
            OR a.liv_codigo like '%$localizar' OR a.cli_cpf like '%$localizar')";
        }
        $sql = ("SELECT a.*, l.liv_titulo, c.cli_nomcli FROM aluguel a
        LEFT OUTER JOIN livro l ON (l.liv_codigo = a.liv_codigo AND l.liv_ativo <> 'N')
        LEFT OUTER JOIN cliente c ON (c.cli_cpf = a.cli_cpf AND c.cli_ativo <> 'N') 
        WHERE a.alu_codigo <> '' $where");
        
        $resultados = mysqli_query($conexao, $sql);
        $lista = array();

        while ($aux = mysqli_fetch_assoc($resultados)) {
            $lista[] = $aux;
        }

        return $lista;
    }

    function devolve($dados, $conexao){

        $liv_codigo = $dados['liv_codigo'];
        $cli_codigo = $dados['cli_codigo'];
        $alu_codigo = $dados['alu_codigo'];
        $datdev     = $dados['alu_datdev']; //implode("/",array_reverse(explode("-",$dados['alu_datfim'])));
            
        $sql = ("UPDATE aluguel SET alu_datdev = '$datdev'
        WHERE liv_codigo = '$liv_codigo' AND cli_cpf = '$cli_codigo' AND alu_codigo = '$alu_codigo'");
       
        $ok = mysqli_query($conexao, $sql);

        if($ok){
            $okk = atualizaEstoqueDev($liv_codigo, $conexao);
            if($okk){
                return $okk;
            }else{
                $ok = False;
            }
        }

        return $ok;
    }

    function atualizaEstoque($liv_codigo, $conexao){
        $sql = (" UPDATE livro SET qtd_estoque = (qtd_estoque - 1) WHERE liv_codigo = '$liv_codigo' ");
        $ok = mysqli_query($conexao, $sql);
        return $ok;
    }

    function atualizaEstoqueDev($liv_codigo, $conexao){
        $sql = (" UPDATE livro SET qtd_estoque = (qtd_estoque + 1) WHERE liv_codigo = '$liv_codigo' ");
        $ok = mysqli_query($conexao, $sql);
        return $ok;
    }
?>