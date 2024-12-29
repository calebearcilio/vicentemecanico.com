<?php include_once("acesso/sessao.php");
if (!logado()) {
    header("Location: index.php?pg=login/form-login");
    exit();
} ?>
    <main class="container">
        <section id="carrinho">
            <h1>Carrinho</h1>
<?php
$total = 0;
if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) === 0):?>
            <p>O carrinho está vazio.</p>
            <a href='index.php?pg=produtos'>Voltar para produtos</a>
<?php else:?>
            <table border="1">
                <tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Subtotal</th><th>Ações</th></tr>
<?php foreach($_SESSION['carrinho'] as $id_produto => $item): 
    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;?>
                <tr>
                    <td><?= htmlspecialchars($item['nome']) ?></td>
                    <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                    <td>
                        <form action="conteudos/carrinho/modificar-carrinho.php" method="post" style="display: inline-block;">
                            <input type='hidden' name='produto_id' value="<?= $id_produto ?>">
                            <input type='number' name='quantidade' value="<?= $item['quantidade'] ?>" min="1">
                            <button type='submit'>Atualizar</button>
                        </form>
                    </td>
                    <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                    <td>
                        <a href="conteudos/carrinho/excluir-produto-carrinho.php?id_produto=<?= $id_produto ?>">Remover</a>
                    </td>
                </tr>
<?php endforeach;?>
                <tr><td colspan="3"><strong>Total: </strong></td><td colspan="2">R$ <?= number_format($total, 2, ',', '.') ?></td></tr>
                <br><a href='conteudos/carrinho/limpar-carrinho.php'>Esvaziar Carrinho</a>
            </table>
<?php endif;?>
        </section>