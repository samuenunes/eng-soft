<?php
    //session_start();
    //include "livro.php"

    $livro = buscarLivro($aux['cod_livro']);
?>

<html>
    <title>Alterar Livro</title>

    <h3> Alterar Livro </h3>

    <body>
        <form id="cadlivro">
            <fielset>
                <label>Alterar Cadastro do Livro!</label><br>
                Título*<br><input type="text" name="titulo" id="titulo" value="<?php echo $livro['tit_livro'];?>"/><br><br>
                Autor*<br><input type="text" name="autor" id="autor" value="<?php echo $livro['aut_livro'];?>"/><br><br>
                Autor 2<br><input type="text" name="autor2" id="autor2" placeholder="Se houver" value="<?php echo $livro['au2_livro'];?>"/><br><br>
                Edição*<br><input type="text" name="edicao" id="edicao" value="<?php echo $livro['edc_livro'];?>"/><br><br>
                Editora*<br><input type="text" name="editora" id="editora" value="<?php echo $livro['edt_livro'];?>"/><br><br>
                Quantidade*<br><input type="number" name="estoque" id="estoque" value="<?php echo $livro['est_livro'];?>"/><br><br>
                Preço base*<br><input type="number" name="precob" id="precob" value="<?php echo $livro['prc_livro'];?>"/><br><br>
                    <button type="submit" name="cadastrar" id="cadastrar" >SALVAR</button> 
            </fieldset>
        </form>
    </body>
</html>

<?php
    $titulo = $_GET['titulo'];
    $autor = $_GET['autor'];
    $autor2 = $_GET['autor2'];
    $edicao = $_GET['edicao'];
    $editora = $_GET['editora'];
    $estoque = $_GET['estoque'];
    $preco = $_GET['precob'];

    if ((isset($titulo) && $titulo != '') && (isset($autor) && $autor != '') &&
        (isset($edicao) && $edicao != '') && (isset($editora) && $editora != '') &&
        (isset($estoque) && $estoque > 0) && (isset($preco) && $preco > 0)){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['titulo'] = $titulo;
        $dadosCadastro['autor'] = $autor;
        if(isset($autor2) && $autor2 != ''){
            $dadosCadastro['autor2'] = $autor2;
        }
        $dadosCadastro['edicao'] = $edicao;
        $dadosCadastro['editora'] = $editora;
        $dadosCadastro['estoque'] = $estoque;
        $dadosCadastro['preco'] = $preco;


       $ok = True; //editarLivro($dadosCadastro);

       if($ok){
        header('Location: sucessoLivroe.php');
       }else{
        echo "Dados preenchidos incorretamente. Tente novamente.";
       }
    }
    else if(isset($_GET['titulo'])){
        echo "NÃÃÃooooooo";
    }
?>