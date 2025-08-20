<?php
$id = $_POST['id'] ?? null;

if ($id === null || !is_numeric($id)) {
    die('ID inválido.');
}

$id = (int) $id;

$pedidos = file_exists('pedidos.json') ? json_decode(file_get_contents('pedidos.json'), true) : [];

if (!isset($pedidos[$id])) {
    die('Pedido não encontrado.');
}

// Marca como concluído
$pedidos[$id]['concluido'] = true;

// Salva novamente
file_put_contents('pedidos.json', json_encode($pedidos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Redireciona para cozinha.php
header('Location: cozinha.php');
exit;
