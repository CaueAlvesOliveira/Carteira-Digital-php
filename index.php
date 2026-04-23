<?php 
    session_start();

    $estaLogado = $_SESSION["logado"] ?? false;

    if(!$estaLogado){
        header("Location: login.php");
    }    
    
    $usuario = $_SESSION["nome"] ?? "ERRO";
    $nome = $_SESSION["nome"] ?? null;      
?>

<h1>Bem Vindo</h1>

<?php 
    echo '<button onclick="location.href=\'logout.php\'" class="botao-sair">Sair</button>';
?>


