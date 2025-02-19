<?php
include_once(__DIR__ . "/../acesso/sessao.php");

function verificar_admin() {
    if (!logado()) {
        $_SESSION['mensagem'] = "Você precisa fazer login para acessar a área administrativa.";
        header("Location: ../index.php?pg=login/form-login");
        exit();
    }
    
    if (!isset($_SESSION['acesso_admin']) || $_SESSION['acesso_admin'] != 1) {
        $_SESSION['mensagem'] = "Você não tem permissão para acessar a área administrativa.";
        header("Location: ../index.php");
        exit();
    }
}

// Função auxiliar para exibir mensagens de feedback
function mostrar_mensagem($tipo) {
    $mensagens = [
        'sucesso' => 'Operação realizada com sucesso!',
        'erro' => 'Ocorreu um erro na operação.',
        'excluido' => 'Item excluído com sucesso!',
    ];
    
    if (isset($mensagens[$tipo])) {
        $classe = ($tipo == 'erro') ? 'erro' : 'sucesso';
        return "<div class='mensagem-{$classe}'>{$mensagens[$tipo]}</div>";
    }
    return '';
}
?>