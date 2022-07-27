<?php
    //session_start();
    //include "cliente.php"

    $cliente = buscarCliente($aux['cod_cliente']);
?>
<html>
<table>
        <tr>
            <th>Código do Cliente</th>
            <th>CPF do Cliente</th>
            <th>Nome do Cliente</th>
        </tr>
        <?php foreach ($cliente as $aux) : ?>
        <tr>
            <td><?php echo $aux['cod_cli']; ?></td>
            <td><?php echo $aux['cpf_cli']; ?></td>
            <td><?php echo $aux['nom_cli']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="row">
        <span> Deseja realmente desativar esse cliente? </span>

        <button type="submit" id="desativar" value="<?php echo $aux['cod_cli']; ?>">SIM</button>
        <a href="cadastrocli.php">NÃO</a>
    </div>
</html>
<?php

    if (isset($_GET['desativar']) && $_GET['desativar'] != ''){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cod_cli'] = $_GET['desativar'];

       $ok = True; //desativarCliente($dadosCadastro);

       if($ok){
       echo "Cliente desativado com sucesso!";
       }else{
        echo $ok;
       }
    }
    else if(isset($_GET['titulo'])){
        echo "NÃÃÃooooooo";
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