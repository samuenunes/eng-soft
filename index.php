<?php
    //session_start();
    //include "db.php"
?>

<html>
    <title>Sistema</title>

    <h3> Bem-Vindo </h3>

    <body>
        <form id="login">
            <fielset>
                <label> Insira usuário e senha para acessar ao sistema!</label><br>
                <div>
                    <input type="text" name="usuario" id="usuario" placeholder="USUÁRIO"/><br><br>
                    <input type="password" name="senha" id="senha" placeholder="SENHA"/><br><br>
                    <button type="submit" name="logar" id="logar" >ENTRAR</button>
                </div>
            </fieldset>
        </form>
    </body>
</html>

<?php
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    $ok = False;
    if ((isset($usuario) && $usuario != '') && (isset($senha) && $senha != '')){
        $dadosLogin = array();
        

        $dadosLogin['usuario'] = $usuario;
        $dadosLogin['senha'] = $senha;

       $ok = True; //logar($dadosLogin);

       if($ok){
        header('Location: home.php');
       }else{
        echo "Usuário ou Senha incorreto. Tente novamente.";
       }
    }
    else if(!$ok && isset($usuario)){
        echo "eroooooooooo";
    }
?>