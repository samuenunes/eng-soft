<?php
    session_start();
    include "livro.php";
?>
<html>
        <head>    
            <title> Livros </title>
        </head>
        <body>
            <h2> Alterar Livros</h2>
            <form id="buscarlivro">
            <br><input type="text" name="localizar" id="localizar" placeholder="PESQUISAR">
            <button type="submit" id="buscar">BUSCAR</button>
            </form>
        </body>
</html>
<?php
    $listaLivros= buscarLivros($_GET['localizar']);
?>
<html>
    <table>
        <tr>
            <th>Código do Livro</th>
            <th>Nome do Livro</th>
            <th>Autor</th>
            <th>Edição</th>
        </tr>
        <?php foreach ($listaLivros as $aux) : ?>
        <tr>
            <td><?php echo $aux['cod_livro']; ?></td>
            <td><?php echo $aux['tit_livro']; ?></td>
            <td><?php echo $aux['aut_livro']; ?></td>
            <td><?php echo $aux['edi_livro']; ?></td>
            <td><a href="editarlivro.php id=<?php echo $aux['cod_livro']; ?>"> Editar </td>
            <td><a href="excluirlivro.php id=<?php echo $aux['cod_livro']; ?>"> Desativar </td>
        </tr>
        <?php endforeach; ?>
    </table>

        <label>
            <br><a href="cadastro.php" >Cadastro de Livro</a><br>
        </label>
        <label>
            <br><a href="home.php" >Voltar ao menu inicial</a><br>
        </label>
</html>