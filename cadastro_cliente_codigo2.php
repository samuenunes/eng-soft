<?php

include_once("conexao.php");

$cpf = filter_input (INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);
$nome = filter_input (INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$celular = filter_input (INPUT_GET, 'celular', FILTER_SANITIZE_STRING);
$phone = filter_input (INPUT_GET, 'phone', FILTER_SANITIZE_STRING);
$endereco = filter_input (INPUT_GET, 'endereco', FILTER_SANITIZE_STRING);

echo "cpf: $cpf <br>";
echo "nome: $nome <br>";
echo "celular: $celular <br>";
echo "phone: $phone <br>";
echo "endereco: $endereco <br>";


$result_cliente = "INSERT INTO cadastro_cliente (cpf, nome, celular, phone, endereco) VALUES ('$cpf', '$nome', '$celular', '$phone', '$endereco')";
$result_cliente = mysqli_query($conn, $result_cliente);