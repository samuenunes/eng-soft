<!DOCTYPE html>
<html lang = "pt-br">
    <head>
    <meta charset = "utf-8">
    <title>login-do-usuário</title>
    <link rel = "stylesheet" type = "text/css" href="css/estilo.css">
    <meta nome = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0">
    </head>
    <body>
        <header>
        <div id="principal">    
            <div id="topo">
            <?php include "topo.php"; ?>
            </div>
            <div id="menu">
            <?php include "menu.php"; ?>
            </div>    
        <div id="conteudo">
            <br>
            <br>
            <form id="login" action = "login_cliente_codigo.php" method = "POST">
                    <label class= "legenda">Usuário</label>
                    <input class = "campos"type="text" name="user" id="user" placeholder="Usuário" required/><br><br>
                    <label class= "legenda">Senha</label>
                    <input class = "campos" type="password" name="senha" id="senha" placeholder="Senha" required/><br>
                    <input type= "submit" class = "bt_enviar" value = "Entrar">
            </form>
        </div>
        <div id= "rodape">
            <?php include "rodape.php"; ?>
        </div>
        </header>
    </body>
</html>