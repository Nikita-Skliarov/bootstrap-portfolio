<?php
ob_start(); // start buffering the output
include 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // check if the username already exists in the database
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    // prepare the JSON response
    $response = ['available' => ($count == 0)];

    // send the JSON response
    header('Content-Type: application/json');
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    echo json_encode($response); 
    exit;
}
?>