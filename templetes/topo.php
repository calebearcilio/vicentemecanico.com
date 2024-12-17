    <header class="topo">
        <div class="logo">
            <a href="index.php"><img src="img/Timao.png" alt="logo" class="img-logo"></a>
            <h1 class="titulo"><a href="index.php">VICENTE MECÂNICO</a></h1>
        </div>
        <div class="botoes">
        <?php include_once("acesso/sessa.php");
        if (logado()): ?>
    <span class="link"><?= $_SESSION['nome_usuario'] ?></span>
            <a href="acesso/logout.php" class="link">Sair</a>
        <?php else: ?>
            <a href="?pg=login/form-login" class="link">Login</a>
            <a href="?pg=cadastrar/form-cadastrar" class="link">Cadastrar-se</a>
        <?php endif;?>
</div>
