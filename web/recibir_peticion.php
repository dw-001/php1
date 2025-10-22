<?php
header('Content-Type: application/json');

// Leer el cuerpo de la petición del cliente
$data = json_decode(file_get_contents('php://input'), true);
$data['id'] = uniqid();
$data['tipo'] = 'peticion';
$data['respondida'] = false;

// Guardar en storage.txt
$file = fopen('storage.txt', 'a');
fwrite($file, json_encode($data) . PHP_EOL);
fclose($file);

echo json_encode(['status' => 'ok', 'peticion_id' => $data['id']]);
?>
