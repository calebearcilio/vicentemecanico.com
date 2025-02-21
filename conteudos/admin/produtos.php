<?php
include_once(__DIR__ . "/../../admin/verificar_admin.php");
verificar_admin();
include_once("config.inc.php");

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$query = mysqli_query($conexao, $sql);
?>
<main class="container">
  <section id="admin">
    <h1>Gerenciamento de Produtos</h1>

    <a href="?pg=admin/produtos/adicionar" class="admin-button">Adicionar Novo Produto</a>

    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Categoria</th>
        <th>Ações</th>
      </tr>
      <?php while($produto = mysqli_fetch_array($query)): ?>
      <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= htmlspecialchars($produto['nome']) ?></td>
        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
        <td><?= $produto['quantidade'] ?></td>
        <td><?= htmlspecialchars($produto['categoria']) ?></td>
        <td>
          <a href="?pg=admin/produtos/editar&id=<?= $produto['id'] ?>">Editar</a> |
          <a href="conteudos/admin/produtos/excluir.php?id=<?= $produto['id'] ?>"
            onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </section>

  <?php mysqli_close($conexao); ?>