        <section class="cadastrar">
            <h1>Faça seu cadastro</h1>
            <form action="conteudos/cadastrar/cadastrar.php" method="post">
                <input type="text" name="usuario" id="usuario" placeholder="Nome de usuário" required> <br>
                <input type="email" name="email" id="email" placeholder="E-mail" required> <br>
                <input type="password" name="senha" id="senha" placeholder="Senha" required> <br>
                <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirme a senha" required><br>
                <button type="submit">Cadastrar</button>
            </form>
        </section>