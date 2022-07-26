<?php
    //session_start();
    //include "livro.php"

    $livro = buscarLivro($aux['cod_livro']);
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
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="row">
        <span> Deseja realmente desativar esse livro? </span>

        <button type="submit" id="desativar" value="<?php echo $aux['cod_livro']; ?>">SIM</button>
        <a href="cadastro.php">NÃO</a>
    </div>
</html>
<?php

    if (isset($_GET['desativar']) && $_GET['desativar'] != ''){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cod_livro'] = $_GET['desativar'];

       $ok = True; //desativarLivro($dadosCadastro);

       if($ok){
       echo "Livro desativado com sucesso!";
       }else{
        echo $ok;
       }
    }
    else if(isset($_GET['titulo'])){
        echo "NÃÃÃooooooo";
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