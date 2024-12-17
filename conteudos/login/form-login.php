<?php 
include_once("acesso/sessa.php");
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}
?>
        <section class="login">
            <h1>Faça seu Login</h1>
            <form action="conteudos/login/login.php" method="post">
                <input type="text" name="usuario" id="usuario" placeholder="Usuario ou email" required> <br>
                <input type="password" name="senha" id="senha" placeholder="Senha" required> <br>
                <button type="submit">Entrar</button>
            </form>
            <?php if (isset($_GET['login']) && $_GET['login'] == 1): ?>

            <p style="color: red;">Senha incorreta</p>

            <?php endif;?>
        </section>