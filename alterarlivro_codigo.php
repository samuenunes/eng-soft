<?php
    session_start();
    //include "alterarlivro.php";
    include "bancodados/conexao.php";
    include "controlador/livros.php";
    if(!isset($_GET['localizar'])){
        $_GET['localizar'] = '';
    }
    $listaLivros= buscarLivros($_GET['localizar'] , $conexao);
?>

    <table>
        <tr>
            <th>Código do Livro</th>
            <th>Nome do Livro</th>
            <th>Autor</th>
            <th>Edição</th>
        </tr>
        <?php foreach ($listaLivros as $aux) : ?>
        <tr>
            <td><?php echo $aux['liv_codigo']; ?></td>
            <td><?php echo $aux['liv_titulo']; ?></td>
            <td><?php echo $aux['liv_autor']; ?></td>
            <td><?php echo $aux['liv_edicao']; ?></td>
            <td><form id="editar" action="editarlivro.php" method="POST"> <input type="hidden" name="liv_codigo" value="<?php echo $aux['liv_codigo']; ?>"><input type="submit" value="Editar"/></form></td>
            <td><form id="desativar" action="excluirlivro.php" method="POST"> <input type="hidden" name="liv_codigo" value="<?php echo $aux['liv_codigo']; ?>"><input type="submit" value="Desativar"/></form></td>
        </tr>
        <?php endforeach; ?>
    </table>

        <label>
            <br><a href="cadastro.php" >Cadastro de Livro</a><br>
        </label>
        <label>
            <br><a href="home.php" >Voltar ao menu inicial</a><br>
        </label>