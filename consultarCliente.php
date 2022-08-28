<?php
    session_start();
    include "bancodados/cliente.php";
    include "controlador/clientes.php";
    
    $cliente = buscarCliente($_POST['cli_codigo'], $conexao);
?>

<html>
    <style>
        input: read-only{
            background-color: lightgray;
        }
    </style>

    <title>Consulta Cliente</title>

    <h3> Consulta Cliente </h3>

    <body>
        <form id="pesquisa">
            <fieldset>
                CPF<br><input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cli_cpf'];?>"/><br><br>
                Nome<br><input type="text" name="nome" id="nome" value="<?php echo $cliente['cli_nomcli'];?>"/><br><br>
                Celular<br><input type="tel" name="celular" id="celular" pattern="[0-9]{9}" value="<?php echo $cliente['cli_celular'];?>"/><br><br>
                Telefone<br><input type="tel" name="phone" id="phone" pattern="[0-9]{9}" value="<?php echo $cliente['cli_phone'];?>"/><br><br>
                Rua<br><input type="text" name="rua" id="rua" value="<?php echo $cliente['cli_rua'];?>"/><br><br>
                Número<br><input type="text" name="numero" id="numero" value="<?php echo $cliente['cli_numend'];?>"/><br><br>
                Bairro<br><input type="text" name="bairro" id="bairro" value="<?php echo $cliente['cli_bairro'];?>"/><br><br>
                Complemento<br><input type="text" name="complemento" id="complemento" value="<?php echo $cliente['cli_compl'];?>"/><br><br>
                Cidade<br><input type="text" name="cidade" id="cidade" value="<?php echo $cliente['cli_cidade'];?>"/><br><br>
                Estado<br><input type="text" name="estado" id="estado" value="<?php echo $cliente['cli_estado'];?>"/><br><br>  
            </fieldset>
        </form>
    </body>
</html>

<fieldset>
    <label>
    <a href="clientes.php" >Voltar</a><br>
    </label> 
    <label>
    <a href="home.php" >Menu inicial</a><br>
    </label>
</fieldset>