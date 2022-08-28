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
<?php

$liv_codigo =	isset($_POST['liv_codigo']) ? $_POST['liv_codigo'] : '';
$cli_codigo =	isset($_POST['cli_codigo']) ? $_POST['cli_codigo'] : '';
$alu_codigo =   isset($_POST['alu_codigo']) ? $_POST['alu_codigo'] : '';
$alu_datdev =   isset($_POST['datdev']) ? $_POST['datdev'] : '';

if ((isset($liv_codigo) && $liv_codigo != '') && (isset($cli_codigo) && $cli_codigo != '') &&
	(isset($alu_codigo) && $alu_codigo != '') && (isset($alu_datdev) && $alu_datdev != '')){
	
    include_once "bancodados/aluga.php";
	include_once "controlador/aluguel.php";

	$dadosCadastro = array();
	$ok = False;
	
	$dadosCadastro['liv_codigo'] = $liv_codigo;
	$dadosCadastro['cli_codigo'] = $cli_codigo;
	$dadosCadastro['alu_codigo'] = $alu_codigo;
	$dadosCadastro['alu_datdev'] = $alu_datdev;
	
	$ok = devolverLivro($dadosCadastro, $conexao);

	if($ok){
		echo " <script> alert('Livro devolvido com sucesso!'); </script>";
		echo " <script> window.location.replace('aluguel.php'); </script>";
	}else{
		echo " <script> alert('Dados preenchidos incorretamente. Tente novamente.'); </script>";
		echo " <script> window.location.replace('devolverLivro.php'); </script>";
    }
}
?>

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
            }
		});
    }

    function finaliza(){
        $('#datdev').appendTo('#devolve');
        $('#datdev').attr('type', 'date');
        $("#devolve").trigger("submit");
    }
</script>