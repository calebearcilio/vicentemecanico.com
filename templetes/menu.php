        <nav class="menu">
            <ul>
                <li><a href="index.php">Página Inicial</a></li>
                <li><a href="index.php?pg=produtos">Produtos</a></li>
                <li><a href="index.php?pg=servicos">Serviços</a></li>
                <li><a href="index.php?pg=contato/contato">Fale Conosco</a></li>
                <div class="buttons-account-menu">
<?php include_once("acesso/sessao.php");
if (logado()): ?>
                    <li class="buttom-account-menu"><a href="index.php?pg=carrinho/mostrar-carrinho">Carrinho</a>
                    <li class="buttom-account-menu"><a href="acesso/logout.php">Sair</a></li>
<?php else: ?>
                    <li class="buttom-account-menu"><a href="index.php?pg=login/form-login">Login</a></li>
                    <li class="buttom-account-menu"><a href="index.php?pg=cadastrar/form-cadastrar" >Cadastrar-se</a></li>
<?php endif;?>
                </div>
            </ul>
        </nav>
    </header>
