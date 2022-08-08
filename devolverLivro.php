<html>
    <head>
        <h3>Devolver Livro</h3>
        <title>Devolver Livro</title>
    </head>

    <body>
       Informe o código do aluguel<br><input type="text" name="codalu" id="codalu"/>
       <button type="button" name="busca" id="busca" onclick="buscaAluguel()">Buscar</button>

       <br><br><br><div id="retorno"></div>

       <br><br><div id="final"></div>
    </body>

</html>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

    function buscaAluguel(){
        var codigo =  $("#codalu").val();
        $.ajax({
			url: 'devolveLivro.php',
			type: 'POST',
			data: {codigo: codigo},
			dataType: 'html',
			success: function(result){
                $("#retorno").html(result);
            },
			error: function(){
				alert('Erro');
            }
		});
    }
    
    
    function finaliza(){
        var dados = {};
        dados.codalu = $("#codalu").val();
        dados.livro = $("#datdev").val();
        dados.datdev = $("#valtot").val();

        $.ajax({
                url: 'finalizaLivro.php',
                type: 'POST',
                data: dados,
                dataType: 'html',
                success: function(result){
                    $("#final").html(result);
                },
                error: function(){
                    alert('Erro');
                }
        });
    }
   


</script>