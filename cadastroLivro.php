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
                <form action = "cadastroLivro_codigo.php" method="POST" id="cadlivro">
                <fielset bord= "2">
                    <label class = "legenda">Título*</label>
                    <input class = "campos" type="text" name="titulo" placeholder= "Digite o título do livro" id="titulo" required/><br>
                    <label class = "legenda">Autor*</label><br>
                    <input class = "campos"type="text" name="autor" placeholder= "Digite o autor do livro" id="autor" required/><br><br>
                    <label class = "legenda">Autor 2</label><br>
                    <input class = "campos"type="text" name="autor2" id="autor2" placeholder="Digite o segundo autor do livro (Não obrigatório)"/><br><br>
                    <label class = "legenda">Edição*</label><br>
                    <input class = "campos" type="text" name="edicao" id="edicao" placeholder= "Digite a edição do livro" required/><br><br>
                    <label class = "legenda">Editora*</label><br>
                    <input class = "campos"type="text" name="editora" id="editora" placeholder=  "Digite a editora do livro" required/><br><br>
                    <label class = "legenda">Quantidade*</label><br>
                    <input class = "campos"type="number" name="estoque" id="estoque" placeholder= "Digite a quantidade" required/><br><br>
                    <label class = "legenda">Preço base*</label><br>
                    <input class = "campos"type="text" name="precob" id="precob" placeholder= "Preço do Livro" required/><br><br>
                        <button class = "bt_enviar" type="submit" name="cadastrar" id="cadastrar" >CADASTRAR</button> 
                        <a class = "bt_enviar" href="cadastro.php">voltar</a><br>
                </fieldset>
                </form>
            </div> 
            <div id = rodape>
                <?php include "rodape_principal.php"; ?>
            </div> 
        </div>    
    </body>
</html>