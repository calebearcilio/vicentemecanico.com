<?php
include_once("../../../admin/verificar_admin.php");
verificar_admin();
include_once("../../../config.inc.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "DELETE FROM mensagens WHERE id = $id";
    
    if (mysqli_query($conexao, $sql)) {
        header("Location: ../../../index.php?pg=admin/mensagens&mensagem=excluido");
    } else {
        header("Location: ../../../index.php?pg=admin/mensagens&mensagem=erro");
    }
}

mysqli_close($conexao);
exit();
?>