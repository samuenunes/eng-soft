<!DOCTYPE html>
<html lang = "pt-br">
    <head>
    <meta charset = "utf-8">
    <title>livros - encontre seus livros e alugue</title>
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
           <form action = "fale_conosco.php" method="POST">
            <label class = "legenda">Nome:</label><br>
            <input type= "text" name= "nome" class = "campos" placeholder= "Digite seu nome completo" required><br>
            <label class = "legenda">E-mail:</label><br>
            <input type= "email" name= "email" class = "campos" placeholder= "Digite seu e-mail" required><br>
            <label class = "legenda">Assunto:</label><br>
            <input type= "text" name= "assunto" class = "campos" placeholder= "Sobre o que você gotaria de falar..." required><br>
            <textarea name= "conteudo" borde ="1" class = "campos2" placeholder = "Digite em no maxímo 140 caracteres o conteúdo." maxlength = "140"></textarea><br>
            <input type= "submit" class = "bt_enviar" value = "Enviar">
            </form>
        </div>
        <div id= "rodape">
            <?php include "rodape.php"; ?>
        </div>
        </header>
    </body>
</html>