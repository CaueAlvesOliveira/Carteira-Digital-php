
<?php 
    session_start();

    include "funcoes.php";

    if (isset($_GET['zerar'])) {
        zerarHistorico();
    }
    
    $historico = $_SESSION['historico'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico | Carteira Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="mx-auto min-h-screen w-full max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/30 backdrop-blur">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-cyan-300/80">Movimentações</p>
                    <h1 class="mt-2 text-3xl font-semibold text-white">Historico de Movimentações</h1>
                    <p class="mt-2 text-sm text-slate-400">Visualize tudo que já foi lançado na carteira.</p>
                </div>
                <div class="flex items-center gap-3">
                    <?php echo '<button class="rounded-2xl border border-white/10 bg-white/5 px-4 py-2 font-semibold text-white transition hover:bg-white/10" onclick="location.href=\'index.php\'">Voltar</button>'; ?>
                    <?php echo '<button class="rounded-2xl bg-rose-500 px-4 py-2 font-semibold text-white transition hover:bg-rose-400" onclick="location.href=\'historico.php?zerar=1\'">Zerar</button>'; ?>
                </div>
            </div>

            <div class="mt-8 overflow-hidden rounded-3xl border border-white/10">
                <table class="min-w-full divide-y divide-white/10 text-left">
                    <thead class="bg-slate-900/80 text-xs uppercase tracking-[0.2em] text-slate-400">
                        <tr>
                            <th class="px-5 py-4">Data</th>
                            <th class="px-5 py-4">Descrição</th>
                            <th class="px-5 py-4">Categoria</th>
                            <th class="px-5 py-4">Valor</th>
                            <th class="px-5 py-4 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10 bg-slate-950/40">
                        <?php foreach ($historico as $item) { ?>
                            <tr class="transition hover:bg-white/5">
                                <td class="px-5 py-4 text-sm text-slate-300"><?= $item['data'] ?></td>
                                <td class="px-5 py-4 font-medium text-white"><?= $item['descricao'] ?></td>
                                <td class="px-5 py-4 text-sm">
                                    <?php if ($item['tipo'] === 'receita') { ?>
                                        <span class="inline-flex items-center rounded-full border border-emerald-400/30 bg-emerald-500/15 px-3 py-1 font-semibold text-emerald-300">
                                            Receita
                                        </span>
                                    <?php } else { ?>
                                        <span class="inline-flex items-center rounded-full border border-rose-400/30 bg-rose-500/15 px-3 py-1 font-semibold text-rose-300">
                                            Despesa
                                        </span>
                                    <?php } ?>
                                </td>
                                <td class="px-5 py-4 font-semibold <?php echo $item['tipo'] === 'receita' ? 'text-emerald-300' : 'text-rose-300'; ?>">
                                    <?php 
                                        if($item['tipo'] == 'receita') {
                                            echo "+ " . "R$" . number_format($item['valor'], 2, ',', '.'); 
                                        } else {
                                             echo "- " ."R$" . number_format($item['valor'], 2, ',', '.');
                                        }
                                    ?>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    <div class="mx-auto flex h-9 w-9 items-center justify-center rounded-full bg-rose-500/15 text-rose-300 ring-1 ring-rose-400/20">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>