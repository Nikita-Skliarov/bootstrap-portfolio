<?php

$server = '127.0.0.1';
$username = 'bit_academy';
$password = 'bit_academy';
$db = 'website';

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Oops. Something went wrong in the database.");
}
?>