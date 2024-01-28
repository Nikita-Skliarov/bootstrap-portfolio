<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Mijn blog</title>
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" data-bs-theme="dark">
            <!-- Container -->
            <div class="container-fluid">
                <!-- Right side and nav toggler -->
                <a class="navbar-brand fs-6" href="#">Nikita Skliarov</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Left side, which hides after sm -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#skills">Skills</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#projects">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu dropdown-menu-left dropdown-menu-end">
                                    <!-- Log in / out anchor -->
                                    <li>
                                        <div class="container">
                                            <?php
                                            //if user not logged in - appears log in anchor
                                            if (!isset($_SESSION['userId'])) {
                                                echo '<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a>';
                                            } else {
                                                echo '<p>' . $_SESSION['userName'] . '<p>';
                                                echo '<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logOutModal">Log Out</a>';
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Image after navbar with some text on it -->
        <div class="container-fluid bg-sucess m-0 tp-0 text-white" id="headerImage">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>~ Student ~</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <h3>Bit-codes</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <a class="btn btn-inherit border border-white text-white" href="#contact">Contact me!</a>
                </div>
            </div>
        </div>
    </header>
    <?php
    // if user has logged in - modal message (alles in een aparte functie?)
    if (isset($_SESSION['userId']) && isset($_SESSION['userName'])) {
        echo '<div class="alert alert-success alert-dismissible fade show m-3" role="alert">';
        echo 'Hi <strong>' . $_SESSION['userName'] . '</strong>! You have successfully logged in. Welcome home!';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    } else if (isset($_GET['loggedOut'])) { //same here, but if user has logged out
        echo '<div class="alert alert-secondary alert-dismissible fade show m-3" role="alert">';
        echo 'You have succesfully logged out. Goodbye!';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    // if user has logged in unsuccessfull
    if (isset($_GET['loginInUnsuccessfull'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show m-3" role="alert">';
        echo 'Wrong username or password. Try again!';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    ?>
    <!-- Container - skills -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <h2 id="skills">Skills</h2>
            </div>
        </div>
        <!-- Two cards -->
        <div class="row gy-3">
            <div class="col-12 col-sm-6">
                <!-- First card -->
                <div class="card h-100 mx-1 mt-3">
                    <div class="card-body text-center">
                        <h3>Programming Languages:</h3>
                        <!-- hr - horizontal divider -->
                        <hr class="mt-5">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mb-5">
                                <h5>HTML</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-success" style="width: 70%"></div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>CSS</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped" style="width: 65%"></div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>Javascript</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-info" style="width: 35%"></div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>PHP</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-warning" style="width: 86%"></div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>SQL</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-danger" style="width: 55%">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>Bootstrap</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-dark" style="width: 100%">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item mb-5">
                                <h5>Security</h5>
                                <div class="progress" role="progressbar" aria-label="Default striped example"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-seconary" style="width: 28%">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Second card -->
            <div class="col-12 col-sm-6">
                <div class="card h-100 mx-1 mt-3">
                    <div class="card-body text-center">
                        <h3>Certificates: </h3>
                        <p>(Hover the cursor over an item to see the date the certificate was received. Or click if you
                            have phone)</p>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5 class="mb-5">Bit Academy</h5>
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                        <!-- Before text - settings to achieve tooltip effect -->
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Sep 5, 2023">Command Line</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Sep 14, 2023">HTML/CSS Beginner</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Sep 21, 2023">PHP Beginner</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Oct 3, 2023">HTML/CSS Advanced</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Oct 17, 2023">JavaScript Introductie</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Oct 25, 2023">PHP Novice</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Nov 8, 2023">JavaScript Beginner</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Nov 15, 2023">MySQL Beginner</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Nov 20, 2023">PHP Web</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Nov 22, 2023">HTML Pro</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Dec 11, 2023">Database PDO</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Dec 21, 2023">Bootstrap</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Jan 8, 2024">Git</li>
                                        <li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Jan 10, 2024">Scrum</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container - projects -->
    <div class="container-fluid">
        <div class="row gy-2">
            <div class="col-12 text-center mt-3">
                <h2 class="mt-3" id="projects">Projects</h2>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card w-100" style="width: 18rem;">
                    <img src="img/memory.png" class="card-img-top" alt="Picture of memory game.">
                    <div class="card-body">
                        <h5 class="card-title">JS - Memory game</h5>
                        <a href="https://github.com/some0ing/memory-game" target="_blank" class="card-text">See
                            project</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card w-100" style="width: 18rem;">
                    <img src="img/mall.png" class="card-img-top" alt="Picture of mall with shops.">
                    <div class="card-body">
                        <h5 class="card-title">Fullstack project - Mall</h5>
                        <p class="card-text">In process...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2 id="contact">Contact</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-8">
                <div class="container-fluid text-center w-100">
                    <form action="">
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="company" class="form-label">Company:</label>
                                <input type="text" name="company" class="form-control" id="company" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="message" class="form-label">Message:</label>
                                <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 mt-3">
                                <input type="submit" name="contactMessage" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>Hellendoorn, 7447PK, Nederland</p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <i class="fa-solid fa-phone"></i>
                            <p>+380669618582</p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <i class="fa-solid fa-envelope"></i>
                            <p>nikitaskliarov2004@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-body-tertiary text-center text-lg-start mt-3">
        <!-- Copyright -->
        <div class="text-center p-3 bg-dark text-white">
            <?php
            // Read the last commit date from the file
            $lastCommitDate = file_get_contents('last_commit.txt');

            // Format the date as per your requirement
            $lastCommitDateFormatted = date('Y-m-d H:i', strtotime($lastCommitDate));
            ?>

            <p>Last commit date:
                <strong>
                    <?php echo $lastCommitDateFormatted; ?>
                </strong>
            </p>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- There are only modals below. 
    They are not appearing on screen, but while pressing button or anchor - so all modals divs must be in the end of document -->
    <!-- Log in modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" method="POST" action="php/login.php">
                        <div class="form-group my-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group my-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Line with Log In button -->
                        <div class="d-flex flex-column">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                    <!-- Line with Sign In button -->
                    <p class="mt-3 mb-0">Don't have account?</p>
                    <form action="php/sign-in.php">
                        <input type="submit" class="btn btn-success" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Log out modal -->
    <div class="modal fade" id="logOutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Log out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>If you log out of your account, unsaved data may be lost.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="php/logout.php">
                        <input type="submit" class="btn btn-primary" value="Log out">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Tooltips sctipt -->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
    <script src="https://kit.fontawesome.com/c81480a66a.js" crossorigin="anonymous"></script>
<!-- Last commit date - git command 
git log -1 --format=%cd > last_commit.txt
 -->
</body>

</html>