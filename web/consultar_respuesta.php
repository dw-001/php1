<?php
header('Content-Type: text/plain');
if (file_exists('storage.txt')) {
    readfile('storage.txt');
} else {
    echo "vacio";
}
?>
