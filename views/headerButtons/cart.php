<?php
include_once "../components/head.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
    <title>Shopping Cart</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1">
        <h1 class="mb-4 display-4 text-center text-uppercase">Shopping Cart</h1>

        <p>Your shopping cart is currently empty. Start shopping now!</p>

        <p>Total Price: $0.00</p>
    </div>
    <?php
    include "../components/footer.php";
    ?>
</body>

</html>