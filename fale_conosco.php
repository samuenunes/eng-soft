<?php

include_once("conexao.php");


$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$assunto = filter_input (INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
$conteudo = filter_input (INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);

echo "nome: $nome <br>";
echo "email: $email <br>";
echo "assunto: $assunto <br>";
echo "conteudo: $conteudo <br>";

$result_contato = "INSERT INTO fale_conosco (nome, email, assunto, conteudo) VALUES ('$nome', '$email', '$assunto', '$conteudo')";
$result_contato = mysqli_query($conn, $result_contato);