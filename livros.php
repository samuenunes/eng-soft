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
                <h2>Consultar Livros</h2>
                <form action = "livros_codigo.php" id="buscarlivro">
                <br><input class = "campos_altera"type="text" name="localizar" id="localizar" placeholder="PESQUISAR">
                <button class = "bt_buscar" type="submit" id="buscar">BUSCAR</button>
                </form>
                <label>
                <br><a href="home.php">voltar</a><br>
                </label>
                <label>
                    <?php include_once "livros_codigo.php"; ?>
                </label>
            </div> 
            <div id = rodape>
                <?php include "rodape_principal.php"; ?>
            </div> 
        </div>    
    </body>
</html>