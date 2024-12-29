<?php
include_once("../../acesso/sessao.php");

//Verifica se está logado
if (!logado()) {
    header("Location: ../../index.php?pg=login/form-login");
    exit();
}

// Verifica se o carrinho já existe, caso contrário, cria
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

//Verifica se os dados do produto foram enviados
if (!$_POST){
    header("Location: ../../index.php?pg=produtos");
    exit();
} else {

    // Recebe os dados do produto
    $id_produto     = $_POST['id_produto'];
    $nome_produto   = $_POST['nome_produto'];
    $preco_produto  = $_POST['preco_produto'];
    $quantidade     = $_POST['quantidade'];
    
    // Verifica se o produto já está no carrinho
    if (isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto]['quantidade'] += $quantidade;
    } else {
        // Adiciona o produto ao carrinho
        $_SESSION['carrinho'][$id_produto] = [
            'nome' => $nome_produto,
            'preco' => $preco_produto,
            'quantidade' => $quantidade
        ];
    }
}    

// Redireciona de volta à página de produtos com uma mensagem de sucesso
header("Location: ../../index.php?pg=produtos&mensagem=adicionado");
exit();
?>
