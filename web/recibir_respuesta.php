<?php
header('Content-Type: text/plain');
file_put_contents('storage.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND | LOCK_EX);
echo "ok";
?>
