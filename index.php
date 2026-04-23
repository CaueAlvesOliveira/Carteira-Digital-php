<?php 
    session_start();

    $estaLogado = $_SESSION["logado"] ?? false;

    if(!$estaLogado){
        header("Location: login.php");
    }    
    
    $usuario = $_SESSION["usuario"] ?? null;
    
    include "funcoes.php";
    informaReceitaOuDespesa();
    saldo();
?>


<Div style="display: flex; gap: 50rem; align-items: center;">
    <h1>My Wallet</h1>
    <div style="display: flex;">
        <h2>Ola, <?php echo $usuario; ?></h2>
        <?php echo '<button style="height: 30px; width: 80px; margin-top: 18px; margin-left: 10px; background-color: #f44336; border: none; cursor: pointer;" onclick="location.href=\'logout.php\'">Sair</button>'; ?>
    </div>
</Div>

<div style="display: flex; gap: 5rem;">
    <div display="flex" flex-direction="column">   
        <h4>Total Receitas:</h4>
        <?php 
           echo "<p>R$ " . number_format($_SESSION["totalReceitas"], 2, ',', '.') . "</p>";
        ?>
    </div>

    <div display="flex" flex-direction="column">   
        <h4>Total Despesas:</h4>
        <?php 
            echo "<p>R$ " . number_format($_SESSION["totalDespesas"], 2, ',', '.') . "</p>";
        ?>
    </div>

    <div display="flex" flex-direction="column">   
        <h4>Saldo Disponível:</h4>
        <p>R$ <?php echo number_format(saldo(), 2, ',', '.'); ?></p>
    </div>
</div>

<form method="post">
    <h3>Adicionar Transação</h3>
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" placeholder="Insira a descrição da transação">
    <label for="valor">Valor:</label>
    <input type="number" name="valor" placeholder="Insira o valor da transação" step="0.01">
    <label for="tipo">Tipo:</label>
    <select name="tipo">
        <option value="receita">Receita</option>
        <option value="despesa">Despesa</option>
    </select>
    <button type="submit">Adicionar</button>
</form>

<button>Ver Detalhes do Histórico</button>