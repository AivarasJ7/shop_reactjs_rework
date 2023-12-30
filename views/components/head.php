<?php
include_once 'headConfig.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Electronics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">
                        <i class="bi bi-house-door"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../headerButtons/help.php">
        <i class="bi bi-question-circle"></i> Help
                </a>
            </li>
            </ul>
            <div class="navbar-text">
                <a class="nav-link" href="../headerButtons/account.php">
                    <i class="bi bi-person"></i> Account
                </a>
                <a class="nav-link" href="../headerButtons/cart.php">
                    <i class="bi bi-cart"></i> Shopping Cart
                </a>
            </div>
        </div>
    </div>
</nav>