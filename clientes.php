<?php
    session_start();
    include "cliente.php";
?>
<html>
        <head>    
            <title>Clientes</title>
        </head>
        <body>
            <h2>Consultar Clientes</h2>
            <form id="buscarcliente">
            <br><input type="text" name="localizar" id="localizar" placeholder="PESQUISAR">
            <button type="submit" id="buscar">BUSCAR</button>
            </form>
        </body>
</html>
<?php
    $listaClientes= buscarClientes($_GET['localizar']);
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
            <td><?php echo $aux['cod_cli']; ?></td>
            <td><?php echo $aux['cpf_cli']; ?></td>
            <td><?php echo $aux['nom_cli']; ?></td>
            <td><a href="consultarCliente.php id=<?php echo $aux['cod_cli']; ?>">Abrir</td>
        </tr>
        <?php endforeach; ?>
    </table>

        <label>
            <br><a href="home.php" >Voltar ao menu inicial</a><br>
        </label>
</html>