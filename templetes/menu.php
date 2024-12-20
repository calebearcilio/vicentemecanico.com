        <nav class="menu">
            <ul>
                <li><a href="index.php">Página inicial</a></li>
                <li><a href="index.php?pg=sobre">Sobre</a></li>
                <li><a href="index.php?pg=servicos">Serviços</a></li>
                <li><a href="index.php?pg=contato">Contatos</a></li>
                <div class="buttons-account-menu">
<?php include_once("acesso/sessa.php");
if (logado()): ?>
                    <li class="buttom-account-menu"><a href=""><?= $_SESSION['nome_usuario'] ?></a>
                    <li class="buttom-account-menu"><a href="acesso/logout.php">Sair</a></li>
<?php else: ?>
                    <li class="buttom-account-menu"><a href="?pg=login/form-login">Login</a></li>
                    <li class="buttom-account-menu"><a href="?pg=cadastrar/form-cadastrar" >Cadastrar-se</a></li>
<?php endif;?>
                </div>
            </ul>
        </nav>
    </header>
