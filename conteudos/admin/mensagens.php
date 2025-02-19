<?php
include_once(__DIR__ . "/../../admin/verificar_admin.php");
verificar_admin();
include_once("config.inc.php");

$sql = "SELECT * FROM mensagens ORDER BY data_envio DESC";
$query = mysqli_query($conexao, $sql);
?>
<main class="container">
  <section id="admin">
    <h1>Mensagens Recebidas</h1>

    <table class="admin-table">
      <tr>
        <th>Data</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Assunto</th>
        <th>Mensagem</th>
        <th>Ações</th>
      </tr>
      <?php while($mensagem = mysqli_fetch_array($query)): ?>
      <tr>
        <td><?= date('d/m/Y H:i', strtotime($mensagem['data_envio'])) ?></td>
        <td><?= htmlspecialchars($mensagem['nome']) ?></td>
        <td><?= htmlspecialchars($mensagem['email']) ?></td>
        <td><?= htmlspecialchars($mensagem['assunto']) ?></td>
        <td><?= nl2br(htmlspecialchars($mensagem['mensagem'])) ?></td>
        <td>
          <a href="?pg=admin/mensagens/excluir&id=<?= $mensagem['id'] ?>"
            onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </section>

  <?php mysqli_close($conexao); ?>