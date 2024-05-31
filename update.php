<?php

$host = "303.itpwebdev.com";
$user = "aunni_db_user";
$pass = "itp3032024";
$db = "aunni_Final_Project_Database";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    echo "<div class='alert alert-danger'>Failed to connect to MySQL: " . $mysqli->connect_error . "</div>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (strtoupper($username) === "ADMIN") {
        echo "<div class='alert alert-warning'>Cannot update password for ADMIN user.</div>";
    } else {
        $query = "SELECT id FROM users WHERE username = '$username' LIMIT 1";
        $result = $mysqli->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userId = $row['id'];

                $updateQuery = "UPDATE users SET password = '$password' WHERE id = $userId";

                if ($mysqli->query($updateQuery)) {
                    echo "<div class='alert alert-success'>Password updated successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error updating password: " . $mysqli->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>User not found.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error: " . $mysqli->error . "</div>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Update page helps admin user update a users password in the database " />
    <title>Update Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
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
        
        <a class="navbar-brand" href="#">Navbar</a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" style="margin-right: 15px;">
                    <a class="nav-link btn btn-danger" href="login.php" style="color:white;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Update Password</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Enter your new password">
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>