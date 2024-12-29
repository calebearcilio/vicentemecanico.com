<?php 
include_once("acesso/sessao.php");

if (!logado()){
    header("Location: index.php?pg=login/form-login");
    exit();
}
?>
    <main class="container">
        <section id="contato">
            <form class="form-contato" action="conteudos/contato/salvar-mensagem.php" method="POST">
                <h1>Entre em Contato</h1>
<?php
if (isset($_GET['mensagem']) && $_GET['mensagem'] == 1):?>
                <p style="color: green; float: right;">Mensagem enviada!</p>
<?php endif; ?>
                <label class="label-contato" for="nome">Seu Nome</label>
                <input class="input-contato" type="text" id="nome" name="nome" value="<?= $_SESSION['nome_usuario'] ?>" required readonly>

                <label class="label-contato" for="email">Seu Email</label>
                <input class="input-contato" type="email" id="email" name="email" value="<?= $_SESSION['email_usuario'] ?>" required readonly>

                <label class="label-contato" for="assunto">Assunto</label>
                <input class="input-contato" type="text" id="assunto" name="assunto">

                <label class="label-contato" for="mensagem">Sua Mensagem</label>
                <textarea class="textarea-contato" id="mensagem" name="mensagem" rows="5" required></textarea>

                <button class="button-contato" type="submit">Enviar Mensagem</button>
            </form>
        </section>