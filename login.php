<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "303.itpwebdev.com";
    $user = "aunni_db_user";
    $pass = "itp3032024";
    $db = "aunni_Final_Project_Database";
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    if ($username == 'ADMIN' && $password == 'ADMIN123') {
        header("Location: admin.html");
        exit();
    }

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true; 
        header("Location: home.html");
        exit();
    } 
    else {
        $error = "Invalid username or password!";
    }
    $stmt->close();
    $mysqli->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $host = "303.itpwebdev.com";
    $user = "aunni_db_user";
    $pass = "itp3032024";
    $db = "aunni_Final_Project_Database";
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Password and confirm password do not match!";
    } else {
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Username already exists!";
            } else {
                $stmt = $mysqli->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $email, $username, $password);
                $stmt->execute();

                $_SESSION['logged_in'] = true;
                header("Location: home.html");
                exit();
            }
        }
        $stmt->close();
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The login page is the entry page of any user. It allows user to enter the page. " />
    <title>Login and Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <a class="navbar-brand" href="https://drive.google.com/file/d/1hK-9Sd5AESSBGs2GHRZiBub0k0QoAXsI/view?usp=sharing" target="_blank">Navbar (Click this to see project Summary -> PDF link) </a>
    </nav>

    <div class="background-section container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#login" data-bs-toggle="tab">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#signup" data-bs-toggle="tab">Sign Up</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="login">
                        <div class="search-form p-4 border rounded mt-2">
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="loginUsername" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="loginUsername" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="loginPassword"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>

                        </div>
                    </div>
                    <div class="tab-pane" id="signup">
                        <div class="search-form p-4 border rounded mt-2">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="mb-3">
                                    <label for="signupEmail" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="signupEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signupUsername" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="signupUsername" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signupPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="signupPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="signupConfirmPassword" required>
                                </div>
                                <input type="hidden" name="signup" value="1">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </form>
                            <?php
                            if (isset($error)) {
                                echo "<p class='text-danger'>$error</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center text-white"> Copyright 2024 Advik Unni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>