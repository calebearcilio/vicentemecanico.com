<?php
include_once("admin/verificar_admin.php");
verificar_admin();
include_once("config.inc.php");

$sql = "SELECT * FROM usuarios ORDER BY data_cadastro DESC";
$query = mysqli_query($conexao, $sql);
?>

<main class="container">
  <section id="admin">

    <h1>Gerenciamento de Usuários</h1>

    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Data de Cadastro</th>
        <th>Admin</th>
        <th>Ações</th>
      </tr>
      <?php while($usuario = mysqli_fetch_array($query)): ?>
      <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= htmlspecialchars($usuario['nome']) ?></td>
        <td><?= htmlspecialchars($usuario['email']) ?></td>
        <td><?= date('d/m/Y H:i', strtotime($usuario['data_cadastro'])) ?></td>
        <td><?= $usuario['acesso_admin'] ? 'Sim' : 'Não' ?></td>
        <td>
          <a href="?pg=admin/usuarios/editar&id=<?= $usuario['id'] ?>">Editar</a> |
          <a href="?pg=admin/usuarios/excluir&id=<?= $usuario['id'] ?>"
            onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </section>

  <?php mysqli_close($conexao); ?>