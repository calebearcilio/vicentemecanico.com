<?php 
include_once("acesso/sessa.php");
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}
?>
    <main class="container-account">
        <section class="section-account">
            <form class="form-account" action="conteudos/login/login.php" method="post">
                <h1 class="title-account">Entre na sua conta</h1>
                <div class="group-input">
                    <input class="input-account" type="text" name="usuario" id="usuario" placeholder="Usuario ou email" required>
                </div>
                <div class="group-input">
                    <input class="input-account" type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <div class="forgot-password">
                    <a href="?pg=forgot-password/form-forgot-password">Esqueceu a senha?</a>
                </div>
                <button class="buttom-account" type="submit">ENTRAR</button>
                <p class="link-account">Não possui conta? <a href="?pg=cadastrar/form-cadastrar">Cadastre-se</a></p>
            </form>
<?php if (isset($_GET['login']) && $_GET['login'] == 1): ?>
    <p class="warning-account">Senha incorreta.</p>
<?php elseif (isset($_GET['login']) && $_GET['login'] == 2): ?>
    <p class="warning-account">Usuário não existe.</p>
<?php endif; ?>        </section>
