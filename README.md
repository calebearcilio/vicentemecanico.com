# vicentemecanico.com

Desenvolvimento de um site destinado a oficina mecânica, com sistema de gerenciamento de conteúdo.

![Interface do Site](img/interface.png)

## 📋 Pré-requisitos

- XAMPP (ou similar com PHP e MySQL)
- Navegador web moderno
- Editor de código (VS Code, Sublime, etc)

## 🚀 Instalação e Configuração

### 1. Instalando o XAMPP

1. Baixe o XAMPP em [https://www.apachefriends.org/pt_br/index.html](https://www.apachefriends.org/pt_br/index.html)
2. Execute o instalador e siga as instruções
3. Após a instalação, abra o Painel de Controle do XAMPP
4. Inicie os serviços Apache e MySQL

### 2. Configurando os Arquivos do Site

1. Navegue até a pasta de instalação do XAMPP (geralmente `C:\xampp\htdocs\`)
2. Crie uma pasta chamada `vicentemecanico`
3. Clone este repositório ou extraia os arquivos do site nesta pasta

### 3. Importando o Banco de Dados

1. Abra o navegador e acesse [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Crie um novo banco de dados chamado `vicentemecanico`
3. Selecione o banco de dados criado
4. Vá na aba "Importar"
5. Clique em "Escolher arquivo" e selecione o arquivo `BDvicentemecanico.sql` da pasta do projeto
6. Clique em "Executar"

### 4. Configurando a Conexão

1. Abra o arquivo `config.inc.php`
2. Verifique se as configurações de conexão estão corretas:

## 🌐 Acessando o Site

1. Abra seu navegador
2. Acesse [http://localhost/vicentemecanico](http://localhost/vicentemecanico)

## 👨‍💼 Acessando a Área Administrativa

1. Acesse [http://localhost/vicentemecanico/admin](http://localhost/vicentemecanico/admin)
2. Use as credenciais padrão:
   - Email: admin@admin.com
   - Senha: admin123

## 🛠️ Funcionalidades

- Gerenciamento de usuários
- Controle de produtos/serviços
- Sistema de mensagens
- Área administrativa protegida
- Gerenciamento de conteúdo

## ⚠️ Importante

- Altere a senha do administrador após o primeiro acesso
- Mantenha o PHP e o MySQL atualizados
- Faça backup regular do banco de dados

## 📝 Licença

Este projeto está sob a licença [MIT](LICENSE).
