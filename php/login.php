<?php
include 'db-connect.php';


//findind row with given username
$username = $_POST['username'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(":username", $username);
$stmt->execute();

// fetch result to assoc. array
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    // A row was successfully fetched
    // Get the salt and password from the user's record
    $salt = $row['salt'];
    $inputPassword = $_POST['password'];

    // Salt the input password and hash it
    $saltedPassword = $inputPassword . $salt;
    $hashedPassword = hash('sha256', $saltedPassword);

    // Compare the hashed input password with the stored hashed password in the database
    if ($hashedPassword === $row['password']) {
        // Make session variables (logged in)
        $userId = $row['id'];
        $userName = $row['username'];
        session_start();
        $_SESSION['userId'] = $userId;
        $_SESSION['userName'] = $userName;

        //redirect to index.php
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php?loginInUnsuccessfull');
    }
} else {
    // No user found with the provided username
    header('Location: ../index.php?loginInUnsuccessfull');
}

?>