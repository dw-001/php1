<?php
header('Content-Type: application/json');

$lines = file('storage.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$pendientes = [];

foreach ($lines as $line) {
    $record = json_decode($line, true);
    if ($record['tipo'] === 'peticion' && !$record['respondida']) {
        $pendientes[] = $record;
    }
}

echo json_encode($pendientes);
?>
