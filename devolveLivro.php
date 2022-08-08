<?php
    //include "aluga.php";
    //$codalu = $_POST['codigo'];
    
    //$retorno = buscaAluguel($codalu);
    $retorno = null;
    $sucess = $retorno != null ? "
    <form id='devolve'>
        Cód.<br><input type='text' name='codalu' id='codalu' value='$retorno['codalu']'/><br><br>
        Livro<br><input type='text' name='livro' id='livro' value='$retorno['cliente']'/><br><br>
        Cliente<br><input type='text' name='cliente' id='cliente' value='$retorno['livro']'/><br><br>
        Data inicial<br><input type='date' name='datini' id='datini' value='$retorno['datini']'/><br><br>
        Data Devolução<br><input type='date' name='datdev' id='datdev'/><br><br>
        Valor a Pagar<br><input type='text' name='valalu' id='valalu' value='$retorno['valalu']'/><br><br>
        Multa<br><input type='text' name='valmulta' id='valmulta' value='$retorno['valmulta']'/><br><br>
        Valor Total<br><input type='text' name='valtot' id='valtot' value='$retorno['valtot']'/><br><br>
        <button type='button' name='finaliza' id='finaliza' onclick='finaliza()'>Finalzar</button>
    </form>
    " : '';
?>
    <?php if($retorno != null){ 
       echo $sucess; ?>

    <?php } ?>
    
    <?php if($retorno == null){
        echo "Não foi possível encontrar a aluguel pelo código informado. Informe o código correto e busque novamente! ";
    }?>