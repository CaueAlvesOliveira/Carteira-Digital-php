<?php 
    session_start();

    $estaLogado = $_SESSION["logado"] ?? false;
    
    if ($estaLogado) {
        header("Location: index.php");
        exit();
    }
        
    if($_SERVER["REQUEST_METHOD"] == "POST") {
            
        $usuario = $_POST["nome"] ?? null;
        $senha = $_POST["senha"] ?? null;
        
        password_hash("admin", PASSWORD_DEFAULT);
        $senhaComHash = '$2y$10$k9Zz93P4rkgeJqpXIGGm3OORdU.qODsAIIwJyUp7SlTo3Wji1Rnna';

        if (!is_null($usuario) && !is_null($senha)) {
            if ($usuario == "admin" && password_verify($senha, $senhaComHash)) {
                $_SESSION["logado"] = true;
                header("Location: index.php");
                exit();
            } else {
                echo "Usuario ou senha incorretos!";
            }
        }
    }
?>

<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" placeholder="Insira seu nome">
    <label for="senha">Senha:</label>
    <input type="text" name="senha" placeholder="Insira sua senha">
    <input type="submit" value="Entrar">
</form>