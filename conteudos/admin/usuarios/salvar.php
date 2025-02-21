<?php
include_once("../../../admin/verificar_admin.php");
verificar_admin();
include_once("../../../config.inc.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $acesso_admin = intval($_POST['admin']);
    
    if (isset($_POST['id'])) {
        // Atualização de usuário existente
        $id = intval($_POST['id']);
        $sql = "UPDATE usuarios SET 
                nome = '$nome',
                email = '$email',
                acesso_admin = $acesso_admin
                WHERE id = $id";
    }
    
    if (mysqli_query($conexao, $sql)) {
        header("Location: ../../../index.php?pg=admin/usuarios&mensagem=sucesso");
    } else {
        header("Location: ../../../index.php?pg=admin/usuarios&mensagem=erro");
    }
    
    mysqli_close($conexao);
    exit();
}
?>