<?php
include_once "../components/head.php";
$user = [
    'username' => 'Vardenis Pavardenis',
    'email' => 'mail@example.com',
    'adress' => '123 Main Street, Apt 4B
    Cityville, State 54321
    United States',
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>My Account</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 display-4 text-center text-uppercase">My Account</h1>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Information</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Username:</strong> <?= $user['username'] ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= $user['email'] ?></li>
                            <li class="list-group-item"><strong>Adresas:</strong> <?= $user['adress'] ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    include "../components/footer.php";
    ?>
</body>

</html>