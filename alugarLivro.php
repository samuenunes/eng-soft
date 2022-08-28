<html>

<h3>Alugar Livro</h3>

<?php
	session_start();
	include "bancodados/cliente.php";
	include "controlador/clientes.php";

	include "bancodados/conexao.php";
	include "controlador/livros.php";
	$localizar = '';
	$listaClientes = buscarClientes($localizar, $conexao);
	$listaLivros = buscarLivros($localizar, $conexao);
?>
<form id='alugar'>
	<div id='geral'>
		<div id='calc'> Selecione o Livro: <br>
			<form id='calcula'>
				<select id='livro' class='selectLiv'>
					<?php foreach($listaLivros as $livros){ ?> 
						<option name='<?php echo $livros['liv_titulo'];?>' value='<?php echo $livros['liv_codigo'];?>'><?php echo $livros['liv_titulo'];?></option>
					<?php } ?>
				</select><br><br>
				Preço<br><input type='text' id='precoo' value=''>
				<button type='button' id='calcular' onclick='calcula()'>calcular</button>
			</form>
		</div>
	
		<!-- bloco clientes -->
		<br><div > Selecione o Cliente: </div>
		<select id='cliente' class='selectCli'>
		<?php foreach($listaClientes as $clientes){ ?> 
			<option name='<?php echo $clientes['cli_nomcli'];?>' value='<?php echo $clientes['cli_codigo'];?>'><?php echo $clientes['cli_nomcli'];?></option>
		<?php } ?>
		</select><br><br>
		
		Data Inicial<br><input type='date' name='dataini'/><br><br>
		Data Final<br><input type='date' name='datafim'/><br><br>

		<br><br><input type='submit' id='gravar' value='Finalizar'>
	</div>
</form>
</html>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

	function calcula(){
		var livro = document.getElementById('cliente');
		var preco = document.getElementById('precoo');
		var selecionado = $('.selectLiv option:selected').val();
		console.log("select==>"+selecionado);
		//preco.setAttribute('value', 'tesetttt');

		var request = $.ajax({
			url: 'controlador/calculaPreco.php',
			type: 'POST',
			data: {'liv_codigo': selecionado},
			dataType: 'html',
			success: function callback(data){
				console.log(data);
			}
		});

		//request.done(callback(resposta));
	}

	function callback(data){
		console.log("SSSSSSS"+data);
	}

	$('.selectLiv').change(function(){
		var selecionado = $('.selectLiv option:selected').val();
		console.log(selecionado);
	});
</script>