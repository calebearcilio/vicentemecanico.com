<?php
include_once(__DIR__ . "/../../admin/verificar_admin.php");
verificar_admin();
?>
<main class="container">
  <section id="admin">
    <h1>Painel Administrativo</h1>

    <div class="admin-menu">
      <a href="?pg=admin/produtos" class="admin-button">Gerenciar Produtos</a>
      <a href="?pg=admin/mensagens" class="admin-button">Visualizar Mensagens</a>
      <a href="?pg=admin/usuarios" class="admin-button">Gerenciar Usuários</a>
    </div>
  </section>