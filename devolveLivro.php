<?php
    include "bancodados/aluga.php";
    include "controlador/aluguel.php";
    $codalu = $_POST['codigo'];
    
    $retorno = False;
    $retorno = buscaAluguel($codalu, $conexao);
    $sucess = '';
    if($retorno){
?>
       <form id='devolve' method="POST">
            <input type='hidden' name='liv_codigo' value='<?php echo $retorno['liv_codigo']?>'/>
            <input type='hidden' name='cli_codigo' value='<?php echo $retorno['cli_cpf']?>'/>
            <input type='hidden' name='alu_codigo' value='<?php echo $retorno['alu_codigo']?>'/>
            </form>
            Cód.<br><input type='text' name='codalu' id='codalu' value='<?php echo $retorno['alu_codigo'];?>'/><br><br>
            Livro<br><input type='text' name='livro' id='livro' value='<?php echo $retorno['liv_codigo'] . ' - ' . $retorno['liv_titulo'];?>'/><br><br>
            Cliente<br><input type='text' name='cliente' id='cliente' value='<?php echo $retorno['cli_nomcli'];?>'/><br><br>
            Data inicial<br><input type='date' name='datini' id='datini' value='<?php echo $retorno['alu_datini'];?>'/><br><br>
            Data Devolução<br><input type='date' name='datdev' id='datdev' value='' required/><br><br>
            Valor a Pagar<br><input type='text' name='valalu' id='valalu' value='<?php echo $retorno['alu_preco'];?>'/><br><br>
            <input type='button' name='finaliza' id='finaliza' onclick="finaliza()" value="Finalizar"/>
        
  <?php }else{ ?>
      <h3>Não foi possível encontrar o aluguel pelo código informado. Código está incorreto ou o Livro já foi devolvido!</h3> 

    <?php } ?>
    

        