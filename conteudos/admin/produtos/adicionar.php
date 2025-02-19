<?php
include_once(__DIR__ . "/../../../admin/verificar_admin.php");
verificar_admin();
?>
<main class="container">
  <section id="admin">
    <h1>Adicionar Novo Produto</h1>

    <form class="admin-form" action="conteudos/admin/produtos/salvar.php" method="post">
      <div>
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>
      </div>

      <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"></textarea>
      </div>

      <div>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>
      </div>

      <div>
        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" required>
      </div>

      <div>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria">
      </div>

      <button type="submit" class="admin-button">Salvar Produto</button>
    </form>
  </section>