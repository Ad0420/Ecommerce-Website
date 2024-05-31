<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The products page is the main page in this website. it allows user to chose products. " />
    <title>ECOMMERCE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="external.css">

    <style>
        .background-section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-button {
            padding: 10px 20px;
            border-radius: 5px;
        }

        .user-quotes-section {
            background-color: #f8f9fa;
            padding: 50px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .product {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- The below Nav Bar is from bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link btn btn-danger" href="login.php" style="color:white;">Logout</a>
                    </li>
                </ul>           
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Checkout</button>
            </form>
        </div>
    </nav>

    <div class="background-section">
        <form class="search-form">
            <input type="text" class="search-input" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="container">
        <h2 class="mt-5 mb-4">Products</h2>
        <div class="pagination justify-content-center mb-4">
            <ul class="pagination">
            </ul>
        </div>
        <div class="row">
            <?php
            $conn = new mysqli("303.itpwebdev.com", "aunni_db_user", "itp3032024", "aunni_Final_Project_Database");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT p.name, p.description, p.price, i.image_url FROM products p LEFT JOIN images i ON p.product_id = i.product_id");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="product">';
                    echo '<img src="' . ($row["image_url"]) . '" alt="' . $row["name"] . '">';
                    echo '<div class="product-info">';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '<p>' . $row["price"] . '</p>';
                    echo '<button class="btn btn-primary add-to-cart">Add</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found</p>';
            }
            $conn->close();
            ?>
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

    <script src="main.js"></script>
    <script src="products.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
