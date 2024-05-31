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

    if (strtoupper($username) === "ADMIN") {
        echo "<div class='alert alert-warning'>Cannot remove ADMIN user.</div>";
    } 
    
    else {
        $query = "SELECT id FROM users WHERE username = '$username' LIMIT 1";
        $result = $mysqli->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userId = $row['id'];

                echo "<script>
                if (confirm('Are you sure you want to delete \"" . addslashes($username) . "\"?')) {
                    window.location.href = 'delete.php?confirm=yes&userId=$userId';
                } else {
                    window.location.href = 'delete.php';
                }
                </script>";
            } 
            
            else {
                echo "<div class='alert alert-warning'>User not found.</div>";
            }
        } 
        
        else {
            echo "<div class='alert alert-danger'>Error: " . $mysqli->error . "</div>";
        }
    }
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes' && isset($_GET['userId'])) {
    $userId = $mysqli->real_escape_string($_GET['userId']);

    $deleteQuery = "DELETE FROM users WHERE id = $userId";
    if ($mysqli->query($deleteQuery)) {
        echo "<div class='alert alert-success'>User deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting user: " . $mysqli->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The delete page is meant to allow admin to delete a user from the database" />
    <title>Delete User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h1>Delete User</h1>
        <form method="post" action="delete.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required placeholder="Enter the username to delete">
            </div>
            <button type="submit" class="btn btn-danger">Delete User</button>
        </form>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center text-white">Copyright 2024 Advik Unni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
