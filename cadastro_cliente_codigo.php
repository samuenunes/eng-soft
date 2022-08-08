<?php
    //session_start();
    //include "livro.php"
    include "cadastro_Cliente.php";
    include "cadastro_cliente_codigo2.php";
?>

<?php
    $cpf = $_GET['cpf'] != '' ? $_GET['cpf'] : '';
    $nome = $_GET['nome'] != '' ? $_GET['nome'] : '';
    $celular = $_GET['celular'] != '' ? $_GET['celular'] : '';
    $phone = $_GET['phone'] != '' ? $_GET['phone'] : '';
    $endereco = $_GET['endereco'] != '' ? $_GET['endereco'] : '';

    if ((isset($cpf) && $cpf != '') && (isset($nome) && $nome != '') &&
        (isset($phone) && $phone != '') && (isset($endereco) && $endereco != '')){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cpf'] = $cpf;
        $dadosCadastro['nome'] = $nome;
        if(isset($phone) && $phone != ''){
            $dadosCadastro['phone'] = $phone;
        }
        $dadosCadastro['celular'] = $celular;
        $dadosCadastro['endereco'] = $endereco;
       
       $ok = True; //cadastrarCliente($dadosCadastro);

       if($ok){
        header('Location: sucessoCliente.php');
       }else{
        echo "Usuário ou nome incorreto. Tente novamente.";
       }
    }
    else if(isset($_GET['cpf'])){
        echo "NÃÃÃooooooo";
    }
?>