<?php
    session_start();
    include "bancodados/cliente.php";
    include "controlador/clientes.php";
     
    $cliente = buscarCliente($_POST['cli_codigo'], $conexao);

?>
<html>
<input type="hidden" name="codcli" id="codcli" value="<?php echo $cliente['cli_codigo']; ?>">
<table>
        <tr>
            <th>Código do Cliente</th>
            <th>CPF do Cliente</th>
            <th>Nome do Cliente</th>
        </tr> 
        <tr>
            <td><?php echo $cliente['cli_codigo']; ?></td>
            <td><?php echo $cliente['cli_cpf']; ?></td>
            <td><?php echo $cliente['cli_nomcli']; ?></td>
        </tr>
    </table>

    <div class="row">
        <span> Deseja realmente desativar esse cliente? </span>

        <form id="editar"> <input type="hidden" name="cli_codigo" value="<?php echo $cliente['cli_codigo']; ?>"><input type="submit" value="SIM"/></form>
        <a href="cadastrocli.php">NÃO</a>
    </div>
</html>
<?php

    if (isset($_GET['cli_codigo']) && $_GET['cli_codigo'] != ''){
        
        include_once "controlador/clientes.php";
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cli_codigo'] = $_GET['cli_codigo'];

        $ok = desativaCliente($dadosCadastro, $conexao);

       if($ok){
        header('Location: sucessoClientee.php');
       }else{
        header('Location: erroclienteex.php');
       }
    }
?>
<html>
    <fieldset>
        <label>
        <a href="cadastrocli.php" >Cadastro de Clientes</a><br>
        </label> 
        <label>
        <a href="home.php" >Menu inicial</a><br>
        </label>
    </fieldset>
</html>