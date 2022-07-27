<?php
    //session_start();
    //include "cliente.php"

    $cliente = buscarCliente($aux['cod_cli']);
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
            <fielset>
                CPF<br><input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf_cli'];?>"/><br><br>
                Nome<br><input type="text" name="nome" id="nome" value="<?php echo $cliente['nom_cli'];?>"/><br><br>
                Celular<br><input type="tel" name="celular" id="celular" pattern="[0-9]{9}" value="<?php echo $cliente['cel_cli'];?>"/><br><br>
                Telefone<br><input type="tel" name="phone" id="phone" pattern="[0-9]{9}" value="<?php echo $cliente['tel_cli'];?>"/><br><br>
                Endereço<br><input type="text" name="endereco" id="endereco" value="<?php echo $cliente['end_cli'];?>"/><br><br> 
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