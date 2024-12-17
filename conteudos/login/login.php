<?php 
include_once("../../config.inc.php");
include_once("../../acesso/sessa.php");

//Verifica se o usuário já está logado
if (logado()) {
    echo "<script>alert('Você já está logado'); window.location.href = 'index.php';</script>";
}

//Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../../?pg=login/form-login");
    mysqli_close($conexao);
    exit();
}

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE (email = '$usuario' OR nome = '$usuario') AND senha = '$senha'";
$query = mysqli_query($conexao, $sql);

//Verifica se usuário existe
if (mysqli_num_rows($query) > 0) {
    $dados_usuario = mysqli_fetch_array($query);
    if ($senha == $dados_usuario['senha']) {
        //Login realizado com sucesso
        session_start();
        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['nome_usuario'] = $dados_usuario['nome'];
        $_SESSION['email_usuario'] = $dados_usuario['email'];
        $_SESSION['data_cadastro'] = $dados_usuario['data_cadastro'];
        $_SESSION['acesso_admin'] = $dados_usuario['acesso_admin'];

        header("Location: ../../index.php");
        mysqli_close($conexao);
        exit();
    } else {
        //Senha incorreta
        header("Locarion: ../../?pg=login/form-login&login=1");
        mysqli_close($conexao);
        exit();
    }
} else {
    //Usuário não existe
    header("Location: ../../?pg=login/form-login&login=2");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>