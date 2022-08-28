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
                <ul class="links_conteudo">
                <br>
                <br>  
                <li><a href="alugarLivro.php">Alugar um livro</a></li>
                <br>
                <br>
                <li><a href="devolverLivro.php">Devolver um livro</a></li>
                <br>
                <br>
                <li><a href="alugados.php">Consultar alugados</a></li>
                <br>
                <br>
                <li><a href="home.php" >Voltar</a></li>
                <br>
                </ul>
            </div> 
            <div id = rodape>
                <?php include "rodape_principal.php"; ?>
            </div> 
        </div>    
    </body>
</html>
