<?php
    session_start();
    include "cliente.php";
?>

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
            <td><a href="editarcliente.php id=<?php echo $aux['cod_cli']; ?>"> Editar </td>
            <td><a href="excluircliente.php id=<?php echo $aux['cod_cli']; ?>">Desativar</td>
        </tr>
        <?php endforeach; ?>
    </table>

        <label>
            <br><a href="cadastrocli.php" >Cadastro de Cliente</a><br>
        </label>
        <label>
            <br><a href="home.php" >Voltar ao menu inicial</a><br>
        </label>
</html>