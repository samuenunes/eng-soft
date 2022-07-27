<?php
    //session_start();
    //include "livro.php"
?>

<html>
    <title>Cadastro Livro</title>

    <h3> Cadastro de Livro </h3>

    <body>
        <form id="cadlivro">
            <fielset>
                <label>Preencha os campos para cadastrar!</label><br>
                Título*<br><input type="text" name="titulo" id="titulo"/><br><br>
                Autor*<br><input type="text" name="autor" id="autor"/><br><br>
                Autor 2<br><input type="text" name="autor2" id="autor2" placeholder="Se houver"/><br><br>
                Edição*<br><input type="text" name="edicao" id="edicao"/><br><br>
                Editora*<br><input type="text" name="editora" id="editora"/><br><br>
                Quantidade*<br><input type="number" name="estoque" id="estoque"/><br><br>
                Preço base*<br><input type="number" name="precob" id="precob"/><br><br>
                    <button type="submit" name="cadastrar" id="cadastrar" >CADASTRAR</button> 
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


       $ok = True; //cadastrarLivro($dadosCadastro);

       if($ok){
        header('Location: sucessoLivro.php');
       }else{
        echo "Usuário ou autor incorreto. Tente novamente.";
       }
    }
    else if(isset($_GET['titulo'])){
        echo "NÃÃÃooooooo";
    }
?>