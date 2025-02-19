<?php 
include_once("config.inc.php");
$sql_produtos = "SELECT * FROM produtos";
$query_produtos = mysqli_query($conexao, $sql_produtos);
?>
<main class="container">
  <section class="list-itens">
    <h1 class="lists-itens__header-title">Nossos Produtos</h1>
    <div class="list-item-container">
      <?php while ($produto = mysqli_fetch_array($query_produtos)):?>
      <div class="single-item">
        <h2 class="single-item__name"> <?= htmlspecialchars($produto['nome']) ?></h2>
        <img class="single-item__image" src="./img/timao.png" alt="Imagem">
        <p class="single-item__text"> <?= htmlspecialchars($produto['descricao']) ?></p>

        <form action="conteudos/carrinho/adicionar-produto-carrinho.php" method="post">
          <input type="hidden" name="id_produto" value="<?= $produto['id'] ?>">
          <input type="hidden" name="nome_produto" value="<?= htmlspecialchars($produto['nome']) ?>">
          <input type="hidden" name="preco_produto" value="<?= $produto['preco'] ?>">

          <div class="single-item__div-price">
            <p class="single-item__price">
              R$
              <?= number_format($produto['preco'], 2, ',', '.') ?> X </p>

            <input class="single-item__input" type='number' name='quantidade' value='1' min='1' required>
          </div>
          <button class="single-item__buttom-add" type="submit">Adicionar ao Carrinho</button>
        </form>
      </div>
      <?php endwhile; mysqli_close($conexao)?>
    </div>
  </section>