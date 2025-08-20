<?php
// Preços das pizzas
$precos_pizzas = [
    'Calabresa' => 37.00,
    'Frango com Catupiry' => 40.00,
    'Portuguesa' => 41.00,
    'Quatro Queijos' => 43.00,
    'Mussarela' => 35.00,
    'Brócolis' => 39.00,
    'Palmito' => 45.00,
    'Vegetariana' => 38.00,
    'Marguerita' => 40.00,
    'Chocolate' => 39.00,
    'Banana com Canela' => 35.00,
    'Romeu e Julieta' => 35.00,
    'Morango com Leite Condensado' => 42.00,
    'Nutella' => 52.00,
    'Nutella com Ouro Branco' => 58.00,
    'Chocolate com Morango' => 48.00,
];

// Preços das bebidas
$precos_bebidas = [
    'Pepsi' => 8.00,
    'Coca-Cola' => 8.00,
    'Sukita Uva' => 6.50,
    'Sukita Laranja' => 6.50,
    'Guaraná' => 7.00,
    'Sprite' => 6.50,
    'Nenhuma' => 0,
];

// Carregar pedidos existentes
$pedidos = file_exists('pedidos.json') ? json_decode(file_get_contents('pedidos.json'), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Pizzaria - Pedidos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #fffaf2;
          max-width: 600px;
          margin: 30px auto;
          padding: 20px;
          color: #2c3e50;
        }

        h1 {
          text-align: center;
          color: #d35400;
          margin-bottom: 30px;
        }

        form {
          background-color: #ffe8d6;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        label {
          display: block;
          margin-top: 15px;
          font-weight: bold;
          color: #d35400;
        }

        input[type="text"],
        select,
        textarea {
          width: 100%;
          padding: 8px 10px;
          margin-top: 6px;
          border: 1px solid #e67e22;
          border-radius: 4px;
          font-size: 1rem;
          box-sizing: border-box;
          resize: vertical;
        }

        textarea {
          min-height: 60px;
        }

        button {
          margin-top: 20px;
          background-color: #e67e22;
          color: white;
          padding: 12px;
          border: none;
          border-radius: 6px;
          font-size: 1.1rem;
          cursor: pointer;
          width: 100%;
          transition: background-color 0.3s ease;
        }

        button:hover {
          background-color: #d35400;
        }

        #precoEstimado {
          font-size: 1.3rem;
          color: #27ae60;
          margin-top: 15px;
          display: inline-block;
          font-weight: bold;
        }

        ul {
          margin-top: 30px;
          padding-left: 0;
          list-style: none;
        }

        ul li {
          background-color: #ffe8d6;
          margin-bottom: 10px;
          padding: 12px;
          border-radius: 6px;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }

        ul li.concluido {
          background-color: #b2d8b2;
          text-decoration: line-through;
          color: #4b704b;
        }

        a.delete {
          margin-left: 15px;
          color: #d35400;
          text-decoration: none;
          font-weight: bold;
          cursor: pointer;
        }
        a.delete:hover {
          color: #a03e00;
        }
    </style>
</head>
<body>

<h1>Gerenciamento de Pedidos Pizzaria 🍕</h1>

<form action="add_order.php" method="post" id="formPedido">
    <label for="cliente">Nome do Cliente:</label>
    <input type="text" name="cliente" id="cliente" placeholder="Nome do Cliente" required />

    <label for="sabor1">Sabor da Pizza (1ª metade):</label>
    <select name="sabor1" id="sabor1" required>
        <option value="" disabled selected>Escolha o sabor</option>
        <?php foreach($precos_pizzas as $sabor => $preco): ?>
            <option value="<?= htmlspecialchars($sabor) ?>"><?= htmlspecialchars($sabor) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="sabor2">Sabor da Pizza (2ª metade - opcional):</label>
    <select name="sabor2" id="sabor2">
        <option value="">Sem metade 2</option>
        <?php foreach($precos_pizzas as $sabor => $preco): ?>
            <option value="<?= htmlspecialchars($sabor) ?>"><?= htmlspecialchars($sabor) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="bebida">Bebida:</label>
    <select name="bebida" id="bebida">
        <option value="Nenhuma" selected>Sem bebida</option>
        <?php foreach($precos_bebidas as $bebida => $preco): ?>
            <?php if ($bebida !== 'Nenhuma'): ?>
                <option value="<?= htmlspecialchars($bebida) ?>"><?= htmlspecialchars($bebida) ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" id="observacoes" rows="3" placeholder="Ex: sem cebola, borda recheada..."></textarea>

    <div><strong>Preço estimado: R$ <span id="precoEstimado">0,00</span></strong></div>

    <button type="submit">Adicionar Pedido</button>
</form>

<h2>Pedidos Atuais</h2>
<ul>
    <?php foreach ($pedidos as $index => $pedido): ?>
        <li class="<?= !empty($pedido['concluido']) ? 'concluido' : '' ?>">
            <div>
                <strong><?= htmlspecialchars($pedido['cliente']) ?></strong> -
                <?= htmlspecialchars($pedido['pizza']) ?>
                <?php if (!empty($pedido['pizza2'])): ?>
                    / <?= htmlspecialchars($pedido['pizza2']) ?>
                <?php endif; ?>
                <?php if (!empty($pedido['bebida']) && $pedido['bebida'] !== 'Nenhuma'): ?>
                    - Bebida: <?= htmlspecialchars($pedido['bebida']) ?>
                <?php endif; ?>
                <?php if (!empty($pedido['observacoes'])): ?>
                    <br><small>Obs: <?= nl2br(htmlspecialchars($pedido['observacoes'])) ?></small>
                <?php endif; ?>
                <?php if (!empty($pedido['concluido'])): ?>
                    <br><small><em>Status: Pedido pronto ✅</em></small>
                <?php endif; ?>
            </div>
            <div>
                <a class="delete" href="delete_order.php?id=<?= $index ?>" onclick="return confirm('Deseja excluir este pedido?')">🗑️</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<script>
const precosPizzas = <?= json_encode($precos_pizzas) ?>;
const precosBebidas = <?= json_encode($precos_bebidas) ?>;

function calculaPreco() {
    const sabor1 = document.getElementById('sabor1').value;
    const sabor2 = document.getElementById('sabor2').value;
    const bebida = document.getElementById('bebida').value;

    let precoPizza = 0;

    if(sabor1 && sabor2) {
        if(sabor2 === "") {
            precoPizza = precosPizzas[sabor1] || 0;
        } else {
            precoPizza = ((precosPizzas[sabor1] || 0) + (precosPizzas[sabor2] || 0)) / 2;
        }
    } else if(sabor1) {
        precoPizza = precosPizzas[sabor1] || 0;
    }

    const precoBebida = precosBebidas[bebida] || 0;

    const precoTotal = precoPizza + precoBebida;

    const precoFormatado = precoTotal.toFixed(2).replace('.', ',');

    document.getElementById('precoEstimado').textContent = precoFormatado;
}

document.getElementById('sabor1').addEventListener('change', calculaPreco);
document.getElementById('sabor2').addEventListener('change', calculaPreco);
document.getElementById('bebida').addEventListener('change', calculaPreco);
</script>

</body>
</html>
