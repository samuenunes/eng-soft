<?php
     session_start();
     include "bancodados/cliente.php";
     include "controlador/clientes.php";
     if(!isset($_GET['localizar'])){
         $_GET['localizar'] = '';
     }
     $listaClientes= buscarClientes($_GET['localizar'] , $conexao);
?>

<html>
    <table>
        <tr>
            <th>Código do Cliente</th>
            <th>CPF do Cliente</th>
            <th>Nome do Cliente</th>
        </tr>
        <?php foreach ($listaClientes as $aux) : ?>
        <tr>
            <td><?php echo $aux['cli_codigo']; ?></td>
            <td><?php echo $aux['cli_cpf']; ?></td>
            <td><?php echo $aux['cli_nomcli']; ?></td>
            <td><form id="editar" action="consultarCliente.php" method="POST"> <input type="hidden" name="cli_codigo" value="<?php echo $aux['cli_codigo']; ?>"><input type="submit" value="Abrir"/></form></td>
        </tr>
        <?php endforeach; ?>
    </table>

        <label>
            <br><a href="home.php" >Voltar ao menu inicial</a><br>
        </label>
</html>