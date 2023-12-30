<?php
include "../../Controllers/CategoriesController.php";
include_once "../components/head.php";
$categories = CategoriesController::getAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    CategoriesController::destroy($_POST['id']);
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Categories</title>
</head>

<body>

    <div class="container mt-5">
        <img src="../../models/images/banner-1.png" class="card-img-top w-100 mb-4" alt="...">

        <h1 class="display-4 text-center text-uppercase">Categories</h1>

        <div class="row mt-4">
            <div class="col">
                <form class="d-flex">
                    <a class="btn btn-success btn-sm me-2" href="./create.php">Create new category</a>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php foreach ($categories as $key => $category) { ?>
                <div class="col">
                    <a href="./show.php?id=<?= $category->id ?>" class="card text-decoration-none">
                        <img src="<?= $category->photo ? $category->photo : '../../models/images/default.jpg' ?>" class="card-img-top img-fluid" alt="<?= $category->name ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category->name ?></h5>
                            <p class="card-text"><?= $category->description ?></p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary btn-sm me-1" href="./show.php?id=<?= $category->id ?>">Show</a>
                            <a class="btn btn-success btn-sm me-1" href="./edit.php?id=<?= $category->id ?>">Edit</a>
                            <form action="./index.php" method="post">
                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include "../components/footer.php"; ?>

</body>

</html>