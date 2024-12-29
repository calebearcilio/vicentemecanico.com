<?php
include_once("../../acesso/sessao.php");
if (!logado()) {
    header("Location: ../../index.php?pg=login/form-login");
    exit();
}

// Remove todos os itens do carrinho
unset($_SESSION['carrinho']);

header("Location: ../../index.php?pg=carrinho/mostrar-carrinho");
exit();
?>
