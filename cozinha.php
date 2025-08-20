<?php
// Carrega pedidos
$pedidos = file_exists('pedidos.json') ? json_decode(file_get_contents('pedidos.json'), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Pedidos para a Cozinha - Pizzaria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 40px auto;
            background-color: #fffaf2;
            padding: 20px;
            color: #2c3e50;
        }
        h1 {
            color: #d35400;
            text-align: center;
            margin-bottom: 30px;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            background-color: #ffe8d6;
            margin-bottom: 15px;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li.concluido {
            background-color: #b2d8b2;
            text-decoration: line-through;
            color: #4b704b;
        }
        .info {
            max-width: 80%;
        }
        .btnConcluir {
            background-color: #27ae60;
            border: none;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btnConcluir:hover {
            background-color: #1e874b;
        }
    </style>
</head>
<body>

<h1>Pedidos para a Cozinha 🍕</h1>

<ul>
    <?php foreach ($pedidos as $index => $pedido): ?>
        <li class="<?= !empty($pedido['concluido']) ? 'concluido' : '' ?>">
            <div class="info">
                <strong>Cliente:</strong> <?= htmlspecialchars($pedido['cliente']) ?><br />
                <strong>Pizza:</strong> <?= htmlspecialchars($pedido['pizza']) ?>
                <?php if (!empty($pedido['pizza2'])): ?>
                    / <?= htmlspecialchars($pedido['pizza2']) ?>
                <?php endif; ?><br />
                <strong>Bebida:</strong> <?= htmlspecialchars($pedido['bebida']) ?><br />
                <?php if (!empty($pedido['observacoes'])): ?>
                    <strong>Observações:</strong> <?= nl2br(htmlspecialchars($pedido['observacoes'])) ?><br />
                <?php endif; ?>
                <?php if (!empty($pedido['concluido'])): ?>
                    <em>Status: Pedido pronto ✅</em>
                <?php else: ?>
                    <em>Status: Em preparo</em>
                <?php endif; ?>
            </div>

            <?php if (empty($pedido['concluido'])): ?>
                <form action="concluir_pedido.php" method="post" style="margin: 0;">
                    <input type="hidden" name="id" value="<?= $index ?>">
                    <button type="submit" class="btnConcluir">Concluir Pedido</button>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
