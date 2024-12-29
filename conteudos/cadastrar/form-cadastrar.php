<?php 
include_once("acesso/sessao.php");
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}
?>
    <main class="container-account">
        <section class="section-account">
            <form class="form-account" action="conteudos/cadastrar/cadastrar.php" method="post">
                <h1 class="title-account">Crie sua conta</h1>
                <div class="group-input">
                    <input 
                    class="input-account" type="text" name="usuario" id="usuario" placeholder="Nome de usuário" required>
                </div>
                <div class="group-input">
                    <input 
                    class="input-account" type="email" name="email" id="email" placeholder="E-mail" required>
                </div>
                <div class="group-input">
                    <input 
                    class="input-account" type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <div class="group-input">
                    <input
                    class="input-account" type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirme a senha" required>
                </div>
                <button 
                class="buttom-account" type="submit">CADASTRAR</button>
                <p class="link-account">Já possui conta? <a href="?pg=login/form-login">Faça login</a></p>
            </form>
<?php if (isset($_GET['cadastrado']) && $_GET['cadastrado'] == 1): ?>
    <p class="warning-account">Usuário já existe.</p>
<?php elseif (isset($_GET['cadastrado']) && $_GET['cadastrado'] == 2): ?>
    <p class="warning-account">As senhas não correspondem.</p>
<?php elseif (isset($_GET['cadastrado']) && $_GET['cadastrado'] == 3): ?>
        <p class="warning-account">Houve um erro no cadastro. tente novamente.</p>
<?php endif; ?>        </section>
