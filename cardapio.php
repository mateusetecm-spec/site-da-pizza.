<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cardápio - Pizzaria</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fffaf2;
      max-width: 800px;
      margin: auto;
      padding: 30px;
    }

    h1 {
      color: #d35400;
      text-align: center;
    }

    h2 {
      color: #e67e22;
      border-bottom: 2px solid #e67e22;
      padding-bottom: 5px;
      margin-top: 40px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      padding: 10px;
      margin-bottom: 8px;
      background-color: #ffe8d6;
      border-radius: 5px;
    }

    .preco {
      float: right;
      font-weight: bold;
      color: #2c3e50;
    }

    a.voltar {
      display: inline-block;
      margin-top: 30px;
      text-decoration: none;
      background-color: #e67e22;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
    }

    a.voltar:hover {
      background-color: #d35400;
    }
  </style>
</head>
<body>

<h1>🍕 Cardápio da Pizzaria</h1>

<section>
<h2>Pizzas Tradicionais</h2>
<ul>
  <li><strong>Calabresa</strong> — Mussarela, calabresa e cebola. <span class="preco">R$ 37,00</span></li>
  <li><strong>Frango com Catupiry</strong> — Frango desfiado e catupiry. <span class="preco">R$ 40,00</span></li>
  <li><strong>Portuguesa</strong> — Presunto, ovo, cebola, ervilha e azeitona. <span class="preco">R$ 41,00</span></li>
  <li><strong>Quatro Queijos</strong> — Mussarela, parmesão, gorgonzola e catupiry. <span class="preco">R$ 43,00</span></li>
  <li><strong>Mussarela</strong> — Tradicional com molho e mussarela. <span class="preco">R$ 35,00</span></li>
  <li><strong>Brócolis</strong> — Com brócolis, alho e mussarela. <span class="preco">R$ 39,00</span></li>
  <li><strong>Palmito</strong> — Palmito com catupiry. <span class="preco">R$ 45,00</span></li>
</ul>
</section>

<section>
<h2>Pizzas Especiais</h2>
<ul>
  <li><strong>Vegetariana</strong> — Abobrinha, berinjela, pimentão e champignon. <span class="preco">R$ 38,00</span></li>
  <li><strong>Marguerita</strong> — Mussarela, tomate e manjericão. <span class="preco">R$ 40,00</span></li>
</ul>
</section>

<section>
<h2>Pizzas Doces</h2>
<ul>
  <li><strong>Chocolate</strong> — Coberta com chocolate ao leite e granulado. <span class="preco">R$ 39,00</span></li>
  <li><strong>Banana com Canela</strong> — Banana, açúcar e canela. <span class="preco">R$ 35,00</span></li>
  <li><strong>Romeu e Julieta</strong> — Goiabada com queijo cremoso. <span class="preco">R$ 35,00</span></li>
  <li><strong>Morango com Leite Condensado</strong> — Morangos frescos e leite condensado. <span class="preco">R$ 42,00</span></li>
  <li><strong>Nutella</strong> — Coberta com creme de avelã. <span class="preco">R$ 52,00</span></li>
  <li><strong>Nutella com Ouro Branco</strong> — Nutella com pedaços de bombom. <span class="preco">R$ 58,00</span></li>
  <li><strong>Chocolate com Morango</strong> — Chocolate ao leite com morangos frescos. <span class="preco">R$ 48,00</span></li>
</ul>
</section>

<section>
<h2>Refrigerantes</h2>
<ul>
  <li><strong>Pepsi</strong> <span class="preco">R$ 8,00</span></li>
  <li><strong>Coca-Cola</strong> <span class="preco">R$ 8,00</span></li>
  <li><strong>Sukita Uva</strong> <span class="preco">R$ 6,50</span></li>
  <li><strong>Sukita Laranja</strong> <span class="preco">R$ 6,50</span></li>
  <li><strong>Guaraná</strong> <span class="preco">R$ 7,00</span></li>
  <li><strong>Sprite</strong> <span class="preco">R$ 6,50</span></li>
</ul>
</section>

<section>
<h2>Sucos</h2>
<ul>
  <li><strong>Suco de Laranja</strong> <span class="preco">R$ 6,00</span></li>
  <li><strong>Suco de Maracujá</strong> <span class="preco">R$ 6,50</span></li>
  <li><strong>Suco de Morango</strong> <span class="preco">R$ 7,00</span></li>
  <li><strong>Suco de Abacaxi</strong> <span class="preco">R$ 6,50</span></li>
  <li><strong>Suco de Uva</strong> <span class="preco">R$ 6,00</span></li>
</ul>
</section>

<a href="index.php" class="voltar">← Voltar para Pedidos</a>

</body>
</html>
