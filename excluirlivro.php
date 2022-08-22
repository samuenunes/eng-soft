<?php
    session_start();
    include "bancodados/conexao.php";
    include "controlador/livros.php";
    $livro = buscarLivro($_POST['liv_codigo'], $conexao);
?>
<html>
    <input type="hidden" name="codliv" id="codliv" value="<?php echo $livro['liv_codigo']; ?>">
<table>
        <tr>
            <th>Código do Livro</th>
            <th>Nome do Livro</th>
            <th>Autor</th>
            <th>Edição</th>
        </tr>
        <tr>
            <td><?php echo $livro['liv_codigo']; ?></td>
            <td><?php echo $livro['liv_titulo']; ?></td>
            <td><?php echo $livro['liv_autor']; ?></td>
            <td><?php echo $livro['liv_edicao']; ?></td>
        </tr>
    </table>
    <br><br><br>
    <div class="row">
        <div> Deseja realmente desativar esse livro? </div>

        <div class="row">
            <form id="editar"> <input type="hidden" name="liv_codigo" value="<?php echo $livro['liv_codigo']; ?>"><input type="submit" value="SIM"/></form>
            <a href="cadastro.php">NÃO</a>
        </div>
    </div>
</html>
<?php

    if (isset($_GET['liv_codigo']) && $_GET['liv_codigo'] != ''){
        
        include_once "controlador/livros.php";
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['liv_codigo'] = $_GET['liv_codigo'];

       $ok = desativarLivro($dadosCadastro, $conexao);

       if($ok){
        header('Location: sucessoLivroe.php');
       }
       else{
        header('Location: errolivroex.php');
       }
    }
?>
<html>
    <fieldset>
        <label>
        <a href="cadastro.php" >Cadastro de Livros</a><br>
        </label> 
        <label>
        <a href="livros.php" >Menu inicial</a><br>
        </label>
    </fieldset>
</html>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>

    function desativa(){
        var codigo = $("#codliv").val();

        var request = $.ajax({

            url: 'controlador/livros.php',
            type: 'POST',
            data: codigo,
            dataType: 'html'
            });

        request.done(callback(resposta));


    }

    function callback(){
        alert("aaaaaaaa");
    }

</script>