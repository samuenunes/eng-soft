<?php
    session_start();
    include "cadastroLivro.php";
    include "bancodados/conexao.php";
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $telefone = $_POST['phone'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
?>

<?php
    $cpf = $_POST['cpf'] != '' ? $_POST['cpf'] : '';
    $nome = $_POST['nome'] != '' ? $_POST['nome'] : '';
    $celular = $_POST['celular'] != '' ? $_POST['celular'] : '';
    $phone = $_POST['phone'] != '' ? $_POST['phone'] : '';
    $rua = $_POST['rua'] != '' ? $_POST['rua'] : '';
    $numero = $_POST['numero'] != '' ? $_POST['numero'] : '';
    $bairro = $_POST['bairro'] != '' ? $_POST['bairro'] : '';
    $complemento = $_POST['complemento'] != '' ? $_POST['complemento'] : '';
    $cidade = $_POST['cidade'] != '' ? $_POST['cidade'] : '';
    $estado = $_POST['estado'] != '' ? $_POST['estado'] : '';



    if ((isset($cpf) && $cpf != '') && (isset($nome) && $nome != '') &&
        (isset($celular) && $celular != '') && (isset($bairro) && $bairro != '')){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cpf'] = $cpf;
        $dadosCadastro['nome'] = $nome;
        if(isset($phone) && $phone != ''){
            $dadosCadastro['phone'] = $phone;
        }
        $dadosCadastro['celular'] = $celular;
        $dadosCadastro['rua'] = $rua;
        $dadosCadastro['numero'] = $numero;
        $dadosCadastro['bairro'] = $bairro;
        if(isset($complemento) && $complemento != ''){
            $dadosCadastro['complemento'] = $complemento;
        }
        $dadosCadastro['cidade'] = $cidade;
        $dadosCadastro['estado'] = $estado;
    
        include_once "controlador/clientes.php";
        $ok = cadastrarCliente($dadosCadastro, $conexao);

       if($ok){
        header('Location: sucessoCliente.php');
       }else{
        echo "Dados incorretos. Tente novamente.";
       }
    }
?>