<?php 
include_once("config.inc.php");
$sql_produtos = "SELECT * FROM produtos";
$query_produtos = mysqli_query($conexao, $sql_produtos);
?>
    <main class="container">
        <section id="produtos">
            <h1 class="title-produtos">Nossos Produtos</h1>
            <div class="produtos">
<?php while ($produto = mysqli_fetch_array($query_produtos)):?>
                <div class="produto">
                    <h2 class="nome-produto"> <?= htmlspecialchars($produto['nome']) ?></h2>
                    <p class="descricao-produto"> <?= htmlspecialchars($produto['descricao']) ?></p>
                    <p class="preco-produto"><strong>Preço: </strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                    <form action="conteudos/carrinho/adicionar-produto-carrinho.php" method="post">
                        <input type="hidden" name="id_produto" value="<?= $produto['id'] ?>">
                        <input type="hidden" name="nome_produto" value="<?= htmlspecialchars($produto['nome']) ?>">
                        <input type="hidden" name="preco_produto" value="<?= $produto['preco'] ?>">
                        <label for='quantidade'>Quantidade:</label>
                        <input type='number' name='quantidade' value='1' min='1' required>
                        <button class="buttom-adicionar-produto" type="submit">Adicionar ao Carrinho</button>
                    </form>
                </div>
<?php endwhile; mysqli_close($conexao)?>
    </div>
        </section>
