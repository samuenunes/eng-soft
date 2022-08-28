<?php
     session_start();
     include "bancodados/aluga.php";
     include "controlador/aluguel.php";
     include "util/util.php";
     if(!isset($_POST['localizar'])){
         $_POST['localizar'] = '';
     }
     $listaAluguel= buscaAlugueis($_POST['localizar'] , $conexao);
?>

<html>
    <table>
        <tr>
            <th>Código do Aluguel</th>
            <th>Livro</th>
            <th>Cliente</th>
            <th>Data Aluguel</th>
            <th>Valor</th>
            <th>Status</th>
        </tr>
        <?php foreach ($listaAluguel as $aux) : ?>
        <tr>
            <?php $data = traduz_data_para_exibir($aux['alu_datini']); ?>
            <td><?php echo $aux['alu_codigo']; ?></td>
            <td><?php echo $aux['liv_codigo'] . " - " . $aux['liv_titulo']; ?></td>
            <td><?php echo $aux['cli_nomcli']; ?></td>
            <td><?php echo $data; ?></td>
            <td><?php echo $aux['alu_preco']; ?></td>
            <td><?php 
                if($aux['alu_datdev'] != null && $aux['alu_datdev'] != ''){ 
                    echo "Devolvido";
                }else{ echo "Em aberto";} ?></td> 
        </tr>
        <?php endforeach; ?>
    </table>

    <label>
        <br><a href="aluguel.php" >Voltar</a><br>
    </label>

    <label>
        <br><a href="home.php" >Voltar ao menu inicial</a><br>
    </label>
</html>