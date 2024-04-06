<?php
$host = 'localhost';
$user = 'cn20280_hovewawe';
$password = 'Amogus_2009';
$database = 'cn20280_hovewawe';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}