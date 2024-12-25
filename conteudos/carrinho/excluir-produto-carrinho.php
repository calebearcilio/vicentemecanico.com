<?php
include_once("../../acesso/sessa.php");
if (!logado()) {
    header("Location: ../../index.php?pg=login/form-login");
}

if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    if (isset($_SESSION['carrinho'][$id_produto])) {
        unset($_SESSION['carrinho'][$id_produto]);
    }
}

header("Location: ../../index.php?pg=carrinho/mostrar-carrinho&mensagem=removido");
?>
