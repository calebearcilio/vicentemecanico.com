<?php
include_once("../../../admin/verificar_admin.php");
verificar_admin();
include_once("../../../config.inc.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $preco = floatval($_POST['preco']);
    $quantidade = intval($_POST['quantidade']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    
    if (isset($_POST['id'])) {
        // Atualização de produto existente
        $id = intval($_POST['id']);
        $sql = "UPDATE produtos SET 
                nome = '$nome',
                descricao = '$descricao',
                preco = $preco,
                quantidade = $quantidade,
                categoria = '$categoria'
                WHERE id = $id";
    } else {
        // Novo produto
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, categoria)
                VALUES ('$nome', '$descricao', $preco, $quantidade, '$categoria')";
    }
    
    if (mysqli_query($conexao, $sql)) {
        header("Location: ../../../index.php?pg=admin/produtos&mensagem=sucesso");
    } else {
        header("Location: ../../../index.php?pg=admin/produtos&mensagem=erro");
    }
    
    mysqli_close($conexao);
    exit();
}
?>