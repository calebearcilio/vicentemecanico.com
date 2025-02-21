<?php 
include_once("admin/verificar_admin.php");
verificar_admin();
include_once("config.inc.php");

if (!isset($_GET['id'])) {
  header("Location: index.php?pg=admin/usuarios");
  exit();
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM usuarios WHERE id = $id";
$query = mysqli_query($conexao, $sql);

if (mysqli_num_rows($query) === 0) {
  header("Location: index.php?pg=admin/usuarios");
  exit();
}

$usuario = mysqli_fetch_array($query);



?>

<main class="container">
  <section id="editar_usuario">

    <h1>Editar Usuário</h1>

    <form class="admin-form" action="conteudos/admin/usuarios/salvar.php" method="post">
      <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

      <div>
        <label for="nome">Nome do usuário:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
      </div>

      <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>">
      </div>

      <div>
        <h3>Acesso admin:</h3>
        <div class="radio-group">
          <label for="admin_sim">Sim</label>
          <input type="radio" id="admin_sim" name="admin" value="1"
            <?= ($usuario['acesso_admin'] == 1 ? 'checked' : '') ?> required>

          <label for="admin_nao">Não</label>
          <input type="radio" id="admin_nao" name="admin" value="0"
            <?= ($usuario['acesso_admin'] == 0 ? 'checked' : '') ?> required>
        </div>
      </div>

      <button type="submit" class="admin-button">Atualizar usuário</button>
    </form>
  </section>

  <?php mysqli_close($conexao); ?>