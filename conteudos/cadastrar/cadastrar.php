<?php 
include_once("../../config.inc.php");
include_once("../../acesso/sessa.php");

//Verifica se o usuário já está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = '../index.php';</script>";
}

//Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../?pg=cadastrar/form-cadastrar");
    exit();
}

$usuario         = $_POST['usuario'];
$email           = $_POST['email'];
$senha           = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

//Verificação de usuário já existente
$sql_verificacao = "SELECT * FROM usuarios WHERE nome = '$usuario' OR email = '$email'";
$query_verificacao = mysqli_query($conexao, $sql_verificacao);

if (mysqli_num_rows($query_verificacao) > 0) {
    header("Location: ../?pg=cadastrar/form-cadastrar&cadastrado=1");
    exit();
}

//Verifica se as senhas correspondem
if ($senha != $confirmar_senha) {
    header("Location: ../?pg=cadastrar/form-cadastrar&cadastrado=2");
    exit();
}


$sql = "INSERT INTO usuarios (nome, email, senha, data_cadastro, acesso_admin) VALUES ('$usuario', '$email', '$senha', NOW(), 0)";
$query = mysqli_query($conexao, $sql);

if ($query) {
    //Cadastro bem-sucedido
    header("Location: ../../?pg=login/form-login");
    exit();
} else {
    //Erro ao inserir usuário ao banco de dados
    header("Location: ../?pg=cadastrar/form-cadastrar&cadastrado=3");
    exit();
}

mysqli_close($conexao);
?>