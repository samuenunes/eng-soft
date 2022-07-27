<html>

<h3>Alugar Livro</h3>

<?php
	session_start();
	//include "aluguel.php";
	//include "livro.php";
	//include "cliente.php";
	//$listaClientes= buscarClientes();
	//$listaLivros= buscarLivros();

	$listaClientes = array ("Ajax", "PHP", "HTML","CSS", "tsste", "aad", "dadas", "rwoir", "sddç", "aadddddddasdasdasdasdad");
	$listaLivros = array ("Ajax", "PHP", "HTML","CSS", "tsste", "aad", "dadas", "rwoir", "sddç", "aadddddddasdasdasdasdad");
	echo "<form id='alugar'>";
	echo "<div id='geral'>";
	//bloco livros
	echo "<div id='calc'> Selecione o Livro: <br>";
	echo "<form id='calcula'>";
	echo "<select id='livro'>";
	foreach($listaLivros as $livros) 
	{
	  echo "<option name='$livros' value='$livros'>$livros</option>";
	}
	echo "</select><br><br>";

	echo "<input type='text' id='precoo' value=''>";
	echo "<button type='button' id='calcular' onclick='calcula()'>calcular</button>";



	echo "</form>";
	echo "</div>";
	
	// bloco clientes
	echo "<div > Selecione o Cliente: </div>";
	echo "<select id='cliente'>";
	foreach($listaClientes as $clientes) 
	{
	  echo "<option name='$clientes' value='$clientes'>$clientes</option>";
	}
	echo "</select><br><br>";
	
	echo "Data Inicial<br><input type='date' name='dataini'/><br><br>";
	echo "Data Final<br><input type='date' name='datafim'/<br><br>";

	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>";
	echo "<script>
	


	function calcula(){

		var livro = document.getElementById('cliente');
		var preco = document.getElementById('precoo');
		var selecionado = livro.options[livro.selectedIndex].value;
		preco.setAttribute('value', 'tesetttt');
		alert('veio');

		var request = $.ajax({

			url: 'calculaPreco.php',
			type: 'POST',
			data: selecionado,
			dataType: 'html'
		});

		request.done(callback(resposta));

	}

	function callback(resposta){

		alert('veio**');
		console.log(resposta);
	}
	</script>";

	//$preco = buscarPreco();
	echo "Preço <br><input type='text' name='preco' id='preco' value='teste'/>";

	echo "<br><br><input type='submit' id='gravar' value='Finalizar'>";
	echo "</form>";
	echo "</div>";

?>

</html>