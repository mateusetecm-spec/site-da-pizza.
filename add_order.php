<?php
// Recebe dados do formulário
$cliente = $_POST['cliente'] ?? '';
$sabor1 = $_POST['sabor1'] ?? '';
$sabor2 = $_POST['sabor2'] ?? '';
$bebida = $_POST['bebida'] ?? 'Nenhuma';
$observacoes = $_POST['observacoes'] ?? '';

// Validar básico
if (!$cliente || !$sabor1) {
    die('Cliente e pelo menos 1 sabor de pizza são obrigatórios.');
}

// Monta o pedido
$pedido = [
    'cliente' => $cliente,
    'pizza' => $sabor1,
    'pizza2' => $sabor2 ?: null,
    'bebida' => $bebida,
    'observacoes' => $observacoes,
    'concluido' => false,
];

// Carrega pedidos existentes
$pedidos = file_exists('pedidos.json') ? json_decode(file_get_contents('pedidos.json'), true) : [];

// Adiciona novo pedido
$pedidos[] = $pedido;

// Salva no arquivo
file_put_contents('pedidos.json', json_encode($pedidos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Redireciona para index.php
header('Location: index.php');
exit;
