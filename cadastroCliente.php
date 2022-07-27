<?php
    //session_start();
    //include "livro.php"
?>

<html>
    <title>Cadastro Cliente</title>

    <h3> Cadastro de Cliente </h3>

    <body>
        <form id="cadcliente">
            <fielset>
                <label>Preencha os campos para cadastrar!</label><br>
                CPF*<br><input type="text" name="cpf" id="cpf"/><br><br>
                Nome*<br><input type="text" name="nome" id="nome"/><br><br>
                Celular*<br><input type="tel" name="celular" id="celular" pattern="[0-9]{9}"/><br><br>
                Telefone<br><input type="tel" name="phone" id="phone" pattern="[0-9]{8}" placeholder="Se houver"/><br><br>
                Endereço*<br><input type="text" name="endereco" id="endereco"/><br><br>
                <button type="submit" name="cadastrar" id="cadastrar">CADASTRAR</button> 
            </fieldset>
        </form>
    </body>
</html>

<?php
    $cpf = $_GET['cpf'] != '' ? $_GET['cpf'] : '';
    $nome = $_GET['nome'] != '' ? $_GET['nome'] : '';
    $celular = $_GET['celular'] != '' ? $_GET['celular'] : '';
    $phone = $_GET['phone'] != '' ? $_GET['phone'] : '';
    $endereco = $_GET['endereco'] != '' ? $_GET['endereco'] : '';

    if ((isset($cpf) && $cpf != '') && (isset($nome) && $nome != '') &&
        (isset($phone) && $phone != '') && (isset($endereco) && $endereco != '')){
        
        $dadosCadastro = array();
        $ok = False;

        $dadosCadastro['cpf'] = $cpf;
        $dadosCadastro['nome'] = $nome;
        if(isset($phone) && $phone != ''){
            $dadosCadastro['phone'] = $phone;
        }
        $dadosCadastro['celular'] = $celular;
        $dadosCadastro['endereco'] = $endereco;
       
       $ok = True; //cadastrarCliente($dadosCadastro);

       if($ok){
        header('Location: sucessoCliente.php');
       }else{
        echo "Usuário ou nome incorreto. Tente novamente.";
       }
    }
    else if(isset($_GET['cpf'])){
        echo "NÃÃÃooooooo";
    }
?>