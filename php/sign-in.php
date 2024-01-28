<?php
include 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get user's input
    $password = $_POST['password'];

    // generate a salt
    $salt = uniqid(mt_rand(), true);

    // combine password and salt
    $saltedPassword = $password . $salt;

    // hash the salted password using sha256
    $hashedPassword = hash('sha256', $saltedPassword);

    //prepare SQL stmt to store $hashedPassword
    $stmt = $pdo->prepare("INSERT INTO users (username, password, salt)
    VALUES (:username, :password, :salt)");
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':salt', $salt);

    //execute stmt
    $stmt->execute();
    //header('Location: ../index.php?loggedIn=true');

    //get id and username from db
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userId = $row['id'];
    $userName = $row['username'];

    //starting session and save id and username in session variable
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['userName'] = $userName;

    //redirect to index.php
    header('Location: ../index.php');

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Sign in</title>
</head>

<body>
    <div class="vh-100 container d-flex justify-content-center align-items-center">
        <form class="border border-success p-3 mb-2 rounded" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
<h1>Sign in</h1>
<p>Please fill out this form to be able to sign in.</p>
            <div class="mb-3">
                <label for="usernameInput" class="form-label">Username</label>
                <input type="text" class="form-control" id="usernameInput" name="username" maxlength="10" required>
                <div id="usernameAvailability"></div>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" pattern="^(?=.*[A-Z]).{8,}$"
                    title="Password must be at least 8 characters long and contain at least one capital letter"
                    name="password" required>
                <div id="passwordHelp" class="form-text">Password must be at least 8 characters long and contain at
                    least one capital letter</div>
            </div>
            <button type="submit" id="submitButton" class="btn btn-primary" disabled>Sign me in!</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const usernameInput = $('#usernameInput');
            const usernameAvailability = $('#usernameAvailability');
            const submitButton = $('#submitButton');

            // Disable the submit button on page load
            submitButton.prop('disabled', true);

            usernameInput.on('input', function () {
                const username = $(this).val();

                // Disable the button when a new input is detected
                submitButton.prop('disabled', true);

                $.post('check-username.php', { username: username }, function (data) {
                    if (data.available) {
                        usernameAvailability.html('<span class="text-success">Username is available.</span>');
                        submitButton.prop('disabled', false); // Enable the submit button
                    } else {
                        usernameAvailability.html('<span class="text-danger">Username is already taken. Please choose a different username.</span>');
                        // Keep the submit button disabled
                    }
                }, 'json')
                    .fail(function (error) {
                        console.error('Error:', error);
                        // Keep the submit button disabled
                    });
            });
        });
    </script>
</body>

</html>