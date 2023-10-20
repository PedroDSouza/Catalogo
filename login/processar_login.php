<?php
session_start();

// Verifique o login e a senha (substitua isso por sua lógica de autenticação)
$usuario_valido = "pedro"; // Substitua pelo seu nome de usuário válido
$senha_valida = "123"; // Substitua pela sua senha válida

if ($_POST["username"] === $usuario_valido && $_POST["password"] === $senha_valida) {
    // Autenticação bem-sucedida, crie uma sessão
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $usuario_valido;
    header("Location: ../consulta.php"); // Redireciona para a página de dashboard após o login
    exit;
} else {
    // Autenticação falhou, redirecione de volta para o formulário de login
    header("Location: ../index.php?erro=1");
    exit;
}
?>
