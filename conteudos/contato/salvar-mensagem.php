<?php
include_once("../../config.inc.php");
include_once("../../acesso/sessao.php");

if (!logado()) {
    header("Location: ../../index.php?pg=login/form-login");
    mysqli_close($conexao);
    exit();
}

// Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../../index.php?pg=contato/contato&mensagem=2");
    mysqli_close($conexao);
    exit();
}

$nome       = mysqli_real_escape_string($conexao, $_POST['nome']);
$email      = mysqli_real_escape_string($conexao, $_POST['email']);
$assunto    = mysqli_real_escape_string($conexao, $_POST['assunto']);
$mensagem   = mysqli_real_escape_string($conexao, $_POST['mensagem']);

// Insere a mensagem no banco de dados

$sql = "INSERT INTO mensagens (nome, email, assunto, mensagem) 
        VALUES ('$nome', '$email', '$assunto', '$mensagem')";
$query = mysqli_query($conexao, $sql);

if ($query) {
    header("Location: ../../index.php?pg=contato/contato&mensagem=1");
    mysqli_close($conexao);
    exit();
} else {
    header("Location: ../../index.php?pg=contato/contato&mensagem=2");
    mysqli_close($conexao);
    exit();
}


// Fecha a conexão
mysqli_close($conexao);
?>