<?php
    session_start();
    include "bancodados/cliente.php";
    include "controlador/clientes.php";
     
    $cliente = buscarCliente($_POST['cli_codigo'], $conexao);
?>

<html>
    <title>Alterar Cliente</title>

    <h3> Alterar Cliente </h3>

    <body>
        <form id="edicliente" method="POST">
            <fieldset>
                <label>Alterar Cadastro do Cliente!</label><br>
                <input type="hidden" name="codigo" value="<?php echo $cliente['cli_codigo'];?>"/>
                CPF*<br><input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cli_cpf'];?>"/><br><br>
                Nome*<br><input type="text" name="nome" id="nome" value="<?php echo $cliente['cli_nomcli'];?>"/><br><br>
                Celular*<br><input type="tel" name="celular" id="celular" pattern="[0-9]{11}" value="<?php echo $cliente['cli_celular'];?>"/><br><br>
                Telefone<br><input type="tel" name="phone" id="phone" pattern="[0-9]{11}" value="<?php echo $cliente['cli_phone'];?>"/><br><br>
                Rua<br><input type="text" name="rua" id="rua" value="<?php echo $cliente['cli_rua'];?>"/><br><br>
                Número<br><input type="text" name="numero" id="numero" value="<?php echo $cliente['cli_numend'];?>"/><br><br>
                Bairro<br><input type="text" name="bairro" id="bairro" value="<?php echo $cliente['cli_bairro'];?>"/><br><br>
                Complemento<br><input type="text" name="complemento" id="complemento" value="<?php echo $cliente['cli_compl'];?>"/><br><br>
                Cidade<br><input type="text" name="cidade" id="cidade" value="<?php echo $cliente['cli_cidade'];?>"/><br><br>
                Estado<br><input type="text" name="estado" id="estado" value="<?php echo $cliente['cli_estado'];?>"/><br><br>
                    <button type="submit" name="finaliza" id="finaliza" >SALVAR</button> 
            </fieldset>
        </form>
    </body>
</html>

<?php

    $codigo =      isset($_POST['codigo'])         ? $_POST['codigo'] : '';
    $cpf =         isset($_POST['cpf'])            ? $_POST['cpf'] : '';
    $nome =        isset($_POST['nome'])           ? $_POST['nome'] : '';
    $celular =     isset($_POST['celular'])        ? $_POST['celular'] : '';
    $telefone =    isset($_POST['phone'])          ? $_POST['phone'] : '';
    $rua =         isset($_POST['rua'])            ? $_POST['rua'] : '';
    $numero =      isset($_POST['numero'])         ? $_POST['numero'] : '';
    $bairro =      isset($_POST['bairro'])         ? $_POST['bairro'] : '';
    $complemento = isset($_POST['complemento'])    ? $_POST['complemento'] : '';
    $cidade =      isset($_POST['cidade'])         ? $_POST['cidade'] : '';
    $estado =      isset($_POST['estado'])         ? $_POST['estado'] : '';
    if ((isset($cpf) && $cpf != '') && (isset($nome) && $nome != '') &&
        (isset($celular) && $celular != '') && (isset($bairro) && $bairro != '')){

        include_once "controlador/clientes.php";
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['codigo'] = $codigo;
        $dadosCadastro['cpf'] = $cpf;
        $dadosCadastro['nome'] = $nome;
        if(isset($telefone) && $telefone != ''){
            $dadosCadastro['telefone'] = $telefone;
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
    
        $ok = editarCliente($dadosCadastro, $conexao);

        if($ok){
            header('Location: sucessoClientee.php');
        }else{
            echo "Usuário ou nome incorreto. Tente novamente.";
        }
    }
?>