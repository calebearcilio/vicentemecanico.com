<?php 
include_once("../../config.inc.php");
include_once("../../acesso/sessao.php");

//Verifica se o usuário já está logado
if (logado()) {
    mysqli_close($conexao);
    echo "<script>alert('Você já está logado!'); window.location.href = '../index.php';</script>";
    exit();
}

//Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../?pg=cadastrar/form-cadastrar");
    mysqli_close($conexao);
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
    mysqli_close($conexao);
    exit();
}

//Verifica se as senhas correspondem
if ($senha != $confirmar_senha) {
    header("Location: ../?pg=cadastrar/form-cadastrar&cadastrado=2");
    mysqli_close($conexao);
    exit();
}


$sql = "INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES ('$usuario', '$email', '$senha', NOW())";
$query = mysqli_query($conexao, $sql);

if ($query) {
    //Cadastro bem-sucedido
    header("Location: ../../?pg=login/form-login");
    mysqli_close($conexao);
    exit();
} else {
    //Erro ao inserir usuário ao banco de dados
    header("Location: ../?pg=cadastrar/form-cadastrar&cadastrado=3");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>