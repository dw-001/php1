<?php
header('Content-Type: application/json');

// Leer la respuesta de la API local
$respuesta = json_decode(file_get_contents('php://input'), true);
$respuesta['id'] = uniqid();
$respuesta['tipo'] = 'respuesta';

// Guardar la respuesta
file_put_contents('storage.txt', json_encode($respuesta) . PHP_EOL, FILE_APPEND);

// Marcar la petición como respondida
$lines = file('storage.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$nuevasLineas = [];

foreach ($lines as $line) {
    $record = json_decode($line, true);
    if ($record['tipo'] === 'peticion' && $record['id'] === $respuesta['peticion_id']) {
        $record['respondida'] = true;
    }
    $nuevasLineas[] = json_encode($record);
}

file_put_contents('storage.txt', implode(PHP_EOL, $nuevasLineas));
echo json_encode(['status' => 'ok']);
?>
