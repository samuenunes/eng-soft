<?php

include_once("conexao.php");

$cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$celular = filter_input (INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$usuario = filter_input (INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

echo "cpf: $cpf <br>";
echo "nome: $nome <br>";
echo "celular: $celular <br>";
echo "usuario: $usuario <br>";

$result_funcionario = "INSERT INTO cadastro_funcionario (cpf, nome, celular, email, usuario) VALUES ('$cpf', '$nome', '$celular', '$email', '$usuario')";
$result_funcionario = mysqli_query($conn, $result_funcionario);