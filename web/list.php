<?php
$ruta = './';
if (!is_dir($ruta)) {
    die("La ruta especificada no es un directorio válido.");
}
$contenido = scandir($ruta);
$elementos = array_diff($contenido, ['.', '..']);
header('Content-Type: text/plain');
foreach ($elementos as $elemento) {
    $rutaCompleta = $ruta . $elemento;
    $tipo = is_dir($rutaCompleta) ? '[Directorio]' : '[Archivo]';
    echo "$tipo $elemento\n";
}
?>
