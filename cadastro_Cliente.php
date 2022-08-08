<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Controle de Livros</title>
        <link rel = "stylesheet" type = "text/css" href="css/estilo_pagina2.css">
        <meta nome = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0">
    </head>
    <body>
        <div id = principal>    
            <div id = topo>
                <?php include "topo_principal.php"; ?>
            </div> 
            <div id = menu>
                <?php include "menu_principal.php"; ?>
            </div> 
            <div id = conteudo>
            <br>
            <br>
                <form action = "cadastro_cliente_codigo.php"id="cadcliente">
                <fielset>
                    <label class= "legenda">CPF*</label><br>
                    <input class= "campos" type="cpf" name="cpf" id="cpf" placeholder= "CPF* do cliente"required/><br>
                    <label class= "legenda">Nome*</label><br>
                    <input class= "campos" type="text" name="nome" id="nome"  placeholder= "Nome* completo do cliente"required/><br><br>
                    <label class= "legenda">Celular*</label><br>
                    <input class= "campos" type="tel" name="celular" id="celular" placeholder="Celular* do cliente" pattern="[0-9]{9}" required/><br><br>
                    <label class= "legenda">Telefone</label><br>
                    <input class= "campos" type="tel" name="phone" id="phone" pattern="[0-9]{8}" placeholder="Telefone (Não Obrigatório) do cliente" /><br><br>
                    <label class= "legenda">Endereço*</label><br>
                    <input class= "campos" type="text" name="endereco" id="endereco" placeholder= "Endereço do cliente"required/><br><br>
                    <button class = "bt_enviar" type="submit" name="cadastrar" id="cadastrar">CADASTRAR</button>
                </fieldset>
                </form>
            </div> 
            <div id = rodape>
                <?php include "rodape_principal.php"; ?>
            </div> 
        </div>    
    </body>
</html>