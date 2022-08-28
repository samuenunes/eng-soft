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
	$listaLivros = buscarLivrosDisp($localizar, $conexao);
?>
<form id='alugar' method="POST">
	<div id='geral'>
		<div id='calc'> Selecione o Livro: <br>
			<select id='livro' class='selectLiv'>
				<?php foreach($listaLivros as $livros){ ?> 
					<option name='<?php echo $livros['liv_titulo'];?>' value='<?php echo $livros['liv_codigo'];?>'><?php echo $livros['liv_titulo'];?></option>
				<?php } ?>
			</select><br><br>
			Preço<br><input required type='text' id='precoo' value=''>
			<button type='button' id='calcular' onclick='calcula()'>calcular</button>
		</div>
	
		<!-- bloco clientes -->
		<br><div > Selecione o Cliente: </div>
		<select id='cliente' class='selectCli'>
			<?php foreach($listaClientes as $clientes){ ?> 
				<option name='<?php echo $clientes['cli_nomcli'];?>' value='<?php echo $clientes['cli_cpf'];?>'><?php echo $clientes['cli_nomcli'];?></option>
			<?php } ?>
		</select><br><br>
		
		Data Inicial<br><input type='date' name='dataini'/><br><br>
		Data Final<br><input type='date' name='datafim'/><br><br>
		<input type="hidden" name="liv_codigo" id="codigoLivro" value=''/>
		<input type="hidden" name="cli_cpf" id="cpfCliente" value=''/>
		<input type="hidden" name="preco" id="preco" value=''/>
		<br><br><input type='submit' id='gravar' value='Finalizar'>
	</div>
</form>
<label>
	<br><a href="aluguel.php">Voltar</a><br>
</label>
</html>

<?php

$liv_codigo =	isset($_POST['liv_codigo']) ? $_POST['liv_codigo'] : '';
$cli_codigo =   isset($_POST['cli_cpf']) ? $_POST['cli_cpf'] : '';
$preco =    	isset($_POST['preco']) ? $_POST['preco'] : '';
$datini =   	isset($_POST['dataini']) ? $_POST['dataini'] : '';
$datfim =   	isset($_POST['datafim']) ? $_POST['datafim'] : '';

if ((isset($liv_codigo) && $liv_codigo != '') && (isset($cli_codigo) && $cli_codigo != '') &&
	(isset($preco) && $preco != '') && (isset($datini) && $datini != '') &&
	(isset($datfim) && $datfim != '')){
	
	include_once "controlador/aluguel.php";

	$dadosCadastro = array();
	$ok = False;
	
	$dadosCadastro['liv_codigo'] = $liv_codigo;
	$dadosCadastro['cli_codigo'] = $cli_codigo;
	$dadosCadastro['alu_preco'] = $preco;
	$dadosCadastro['alu_datini'] = $datini;
	$dadosCadastro['alu_datfim'] = $datfim;
	
	$num = '';
	$ok = alugarLivro($dadosCadastro, $conexao);
	if(isset($ok) && $ok){
		$num = $ok['numero'];
	}

	if($num != ''){
		echo " <script> alert('Aluguel realizado com sucesso! O código é: '+$num); </script>";
		echo " <script> window.location.replace('aluguel.php'); </script>";
	}else if(!$ok){
		echo " <script> alert('Dados preenchidos incorretamente. Tente novamente.'); </script>";
		echo " <script> window.location.replace('alugarLivro.php'); </script>";
	}else{
		echo " <script> alert('Erro ao realizar transação. Tente novamente.'); </script>";
		echo " <script> window.location.replace('alugarLivro.php'); </script>";
	}
}
?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>

	function calcula(){
		var selecionado = $('.selectLiv option:selected').val();
		$("#codigoLivro").val($('.selectLiv option:selected').val());
		$("#cpfCliente").val($('.selectCli option:selected').val());
		console.log("select==>"+selecionado);

		var request = $.ajax({
			url: 'controlador/calculaPreco.php',
			type: 'POST',
			data: {'liv_codigo': selecionado},
			dataType: 'html',
			success: function callback(data){
				console.log(data);
				$("#precoo").val(data);
				$("#preco").val(data);
			}
		});
	}

	$('.selectLiv').change(function(){
		$("#codigoLivro").val($('.selectLiv option:selected').val());
	});

	$('.selectCli').change(function(){
		$("#cpfCliente").val($('.selectCli option:selected').val());
		console.log
	});
</script>