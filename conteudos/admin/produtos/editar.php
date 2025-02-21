<?php
include_once("admin/verificar_admin.php");
verificar_admin();
include_once("config.inc.php");

if (!isset($_GET['id'])) {
  header("Location: index.php?pg=admin/produtos");
  exit();
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM produtos WHERE id = $id";
$query = mysqli_query($conexao, $sql);

if (mysqli_num_rows($query) === 0) {
  header("Location: index.php?pg=admin/produtos");
  exit();
}

$produto = mysqli_fetch_array($query);
?>

<main class="container">
  <section id="editar_produto">

    <h1>Editar Produto</h1>

    <form class="admin-form" action="conteudos/admin/produtos/salvar.php" method="post">
      <input type="hidden" name="id" value="<?= $produto['id'] ?>">

      <div>
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
      </div>

      <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"><?= htmlspecialchars($produto['descricao']) ?></textarea>
      </div>

      <div>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>
      </div>

      <div>
        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?= $produto['quantidade'] ?>" required>
      </div>

      <div>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?= htmlspecialchars($produto['categoria']) ?>">
      </div>

      <button type="submit" class="admin-button">Atualizar Produto</button>
    </form>
  </section>

  <?php mysqli_close($conexao); ?>