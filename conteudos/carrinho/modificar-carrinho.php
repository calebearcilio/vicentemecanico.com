<?php 
include_once("../../acesso/sessa.php");
if (!logado()) {
    header("Location: ../../index.php?pg=login/form-login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id]['quantidade'] = $quantidade;
    }

}
header("Location: ../../index.php?pg=carrinho/mostrar-carrinho");
exit();
?>