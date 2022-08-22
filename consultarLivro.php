<?php
    session_start();
    include "bancodados/conexao.php";
    include "controlador/livros.php";
    
    $livro = buscarLivro($_POST['liv_codigo'], $conexao);
?>

<html>
    <style>
        input: read-only{
            background-color: lightgray;
        }
    </style>

    <title>Consulta Livro</title>

    <h3> Consulta Livro </h3>

    <body>
        <form id="pesquisa">
            <fielset>
                Título<br><input type="text" name="titulo" id="titulo" value="<?php echo $livro['liv_titulo'];?>"/><br><br>
                Autor<br><input type="text" name="autor" id="autor" value="<?php echo $livro['liv_autor'];?>"/><br><br>
                Autor 2<br><input type="text" name="autor2" id="autor2" value="<?php echo $livro['liv_autor2'];?>"/><br><br>
                Edição<br><input type="text" name="edicao" id="edicao" value="<?php echo $livro['liv_edicao'];?>"/><br><br>
                Editora<br><input type="text" name="editora" id="editora" value="<?php echo $livro['liv_editora'];?>"/><br><br>
                Quantidade<br><input type="number" name="estoque" id="estoque" value="<?php echo $livro['qtd_estoque'];?>"/><br><br>
                Preço base<br><input type="number" name="precob" id="precob" value="<?php echo $livro['liv_preco'];?>"/><br><br> 
            </fieldset>
        </form>
    </body>
</html>

<fieldset>
    <label>
    <a href="livros.php" >Cadastro de Livros</a><br>
    </label> 
    <label>
    <a href="home.php" >Menu inicial</a><br>
    </label>
</fieldset>