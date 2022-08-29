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
            <form id="cadcliente" method="POST" action="cadastro_funcionario2.php">
                <label class="legenda">CPF*</label><br>
                <input class="campos" type="number" name="cpf" id="cpf" placeholder = "Digite seu cpf" required/><br>
                <label class="legenda">Nome*</label><br>
                <input class="campos" type="text" name="nome" id="nome" placeholder = "Digite seu nome completo" required/><br>
                <label class="legenda">Celular*</label><br>
                <input class="campos" type="tel" name="celular" id="celular" pattern="[0-9]{11}" placeholder="Digite o número do celular" required/><br>
                <label class="legenda">E-mail*</E-mail></label><br>
                <input class="campos" type="email" name="email" id="email" placeholder= "Digite seu email" required/><br>
                <label class="legenda">Usuario*</label><br>
                <input class="campos" type="text" name="usuario" id="usuario"/><br>
                <label class="legenda">Senha*</label><br>
                <input class="campos" type="password" name="senha" id="senha"/><br>
                <input type= "submit" class = "bt_enviar" value = "Cadastrar">
        </form>
        </div>
        <div id= "rodape">
            <?php include "rodape.php"; ?>
        </div>
        </header>
    </body>
</html>