<?php

echo 'PHP VERSION: ' . PHP_VERSION . '<br>';
echo 'PHP INI: ' . php_ini_loaded_file() . '<br>';

if (extension_loaded('gd')) {
    echo 'GD: AKTIF';
} else {
    echo 'GD: TIDAK AKTIF';
}
