
<?php 
    session_start();

    include "funcoes.php";

    if (isset($_GET['zerar'])) {
        zerarHistorico();
    }
    
    $historico = $_SESSION['historico'] ?? [];
    echo '<button onclick="location.href=\'index.php\'">Voltar</button>';
    echo '<button onclick="location.href=\'historico.php?zerar=1\'">Zerar</button>'
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Historico de Movimentações</h1>

 <table>
    <tr>
        <th>Data</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($historico as $item) { ?>
        <tr>
            <td><?= $item['data'] ?></td>
            <td><?= $item['descricao'] ?></td>
            <td><?= $item['tipo'] ?></td>
            <td>R$ <?= number_format($item['valor'], 2, ',', '.') ?></td>
            <td>
                <div style="border: 1px solid red; border-radius: 7rem; display: flex; justify-content: center; background-color: red; width: 1.5rem;">
                    <i class="fa fa-times"></i>
                </div>
            </td>
        </tr>
    <?php } ?>
 </table>