<?php
    //session_start();
    //include "livro.php"

    $livro = buscarLivro($aux['cod_livro']);
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
                Título<br><input type="text" name="titulo" id="titulo" value="<?php echo $livro['tit_livro'];?>"/><br><br>
                Autor<br><input type="text" name="autor" id="autor" value="<?php echo $livro['aut_livro'];?>"/><br><br>
                Autor 2<br><input type="text" name="autor2" id="autor2" placeholder="Se houver" value="<?php echo $livro['au2_livro'];?>"/><br><br>
                Edição<br><input type="text" name="edicao" id="edicao" value="<?php echo $livro['edc_livro'];?>"/><br><br>
                Editora<br><input type="text" name="editora" id="editora" value="<?php echo $livro['edt_livro'];?>"/><br><br>
                Quantidade<br><input type="number" name="estoque" id="estoque" value="<?php echo $livro['est_livro'];?>"/><br><br>
                Preço base<br><input type="number" name="precob" id="precob" value="<?php echo $livro['prc_livro'];?>"/><br><br> 
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