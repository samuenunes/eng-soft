<?php
    //session_start();
    //include "cliente.php"

    $cliente = buscarCliente($aux['cod_cli']);
?>

<html>
    <title>Alterar Cliente</title>

    <h3> Alterar Cliente </h3>

    <body>
        <form id="cadcliente">
            <fielset>
                <label>Alterar Cadastro do Cliente!</label><br>
                CPF*<br><input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf_cli'];?>"/><br><br>
                Nome*<br><input type="text" name="nome" id="nome" value="<?php echo $cliente['nom_cli'];?>"/><br><br>
                Celular*<br><input type="tel" name="celular" id="celular" pattern="[0-9]{9}" value="<?php echo $cliente['cel_cli'];?>"/><br><br>
                Telefone<br><input type="tel" name="phone" id="phone" pattern="[0-9]{9}" value="<?php echo $cliente['tel_cli'];?>"/><br><br>
                Endereço<br><input type="text" name="endereco" id="endereco" value="<?php echo $cliente['end_cli'];?>"/><br><br>
                <button type="submit" name="cadastrar" id="cadastrar" >SALVAR</button> 
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
        
        $ok = True; //editarCliente($dadosCadastro);
 
        if($ok){
         header('Location: sucessoClientee.php');
        }else{
         echo "Usuário ou nome incorreto. Tente novamente.";
        }
     }
     else if(isset($_GET['cpf'])){
         echo "NÃÃÃooooooo";
     }
?>