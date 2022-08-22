<?php
    session_start();
    include "bancodados/conexao.php";
    include "controlador/livros.php";
    
    $livro = buscarLivro($_POST['liv_codigo'], $conexao);
?>

<html>
    <title>Alterar Livro</title>

    <h3> Alterar Livro </h3>

    <body>
        <form id="cadlivro">
            <fielset>
                <label>Alterar Cadastro do Livro!</label><br>
                <input type="hidden" name="codigo" value="<?php echo $livro['liv_codigo'];?>"/>
                Título*<br><input type="text" name="titulo" id="titulo" value="<?php echo $livro['liv_titulo'];?>"/><br><br>
                Autor*<br><input type="text" name="autor" id="autor" value="<?php echo $livro['liv_autor'];?>"/><br><br>
                Autor 2<br><input type="text" name="autor2" id="autor2" placeholder="Se houver" value="<?php echo $livro['liv_autor2'];?>"/><br><br>
                Edição*<br><input type="text" name="edicao" id="edicao" value="<?php echo $livro['liv_edicao'];?>"/><br><br>
                Editora*<br><input type="text" name="editora" id="editora" value="<?php echo $livro['liv_editora'];?>"/><br><br>
                Quantidade*<br><input type="number" name="estoque" id="estoque" value="<?php echo $livro['qtd_estoque'];?>"/><br><br>
                Preço base*<br><input type="number" name="precob" id="precob" value="<?php echo $livro['liv_preco'];?>"/><br><br>
                    <button type="submit" name="cadastrar" id="cadastrar" >SALVAR</button> 
            </fieldset>
        </form>
    </body>
</html>

<?php
    $codigo =   isset($_GET['codigo']) ? $_GET['codigo'] : '';
    $titulo =   isset($_GET['titulo']) ? $_GET['titulo'] : '';
    $autor =    isset($_GET['autor']) ? $_GET['autor'] : '';
    $autor2 =   isset($_GET['autor2']) ? $_GET['autor2'] : '';
    $edicao =   isset($_GET['edicao']) ? $_GET['edicao'] : '';
    $editora =  isset($_GET['editora']) ? $_GET['editora'] : '';
    $estoque =  isset($_GET['estoque']) ? $_GET['estoque'] : '';
    $preco =    isset($_GET['precob']) ? $_GET['precob'] : '';

    if ((isset($titulo) && $titulo != '') && (isset($autor) && $autor != '') &&
        (isset($edicao) && $edicao != '') && (isset($editora) && $editora != '') &&
        (isset($estoque) && $estoque > 0) && (isset($preco) && $preco > 0)){
        
        include_once "controlador/livros.php";

        $dadosCadastro = array();
        $ok = False;
        
        $dadosCadastro['codigo'] = $codigo;
        $dadosCadastro['titulo'] = $titulo;
        $dadosCadastro['autor'] = $autor;
        if(isset($autor2) && $autor2 != ''){
            $dadosCadastro['autor2'] = $autor2;
        }
        $dadosCadastro['edicao'] = $edicao;
        $dadosCadastro['editora'] = $editora;
        $dadosCadastro['estoque'] = $estoque;
        $dadosCadastro['preco'] = $preco;


       $ok = editarLivroo($dadosCadastro, $conexao);

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