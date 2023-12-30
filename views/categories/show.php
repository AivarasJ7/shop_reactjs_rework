<?php
include "../../Controllers/CategoriesController.php";
include_once "../../Controllers/ItemsController.php";
include_once "../components/head.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
    $categoryId = isset($_GET['id']) ? $_GET['id'] : '';
    header("Location: ./show.php?id=$categoryId&search=$searchTerm");
}

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$category = CategoriesController::findWithItems($_GET['id'], $searchTerm);

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

if ($sort == 'price_asc') {
    usort($category->items, function ($a, $b) {
        return $a->price - $b->price;
    });
} elseif ($sort == 'price_desc') {
    usort($category->items, function ($a, $b) {
        return $b->price - $a->price;
    });
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?= $category->name ?? 'Category' ?></title>
    <style>
        body {
            padding-bottom: 70px;
        }

        .footer {
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }

        .category-section {
            margin-top: 20px;
        }

        .category-image {
            max-height: 200px;
            width: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5 category-section">
        <img src="../../models/images/banner-1.png" class="card-img-top img-fluid" alt="...">

        <h1 class="mb-4 display-4 text-center text-uppercase"><?= $category->name ?? 'Category' ?></h1>

        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= $category->photo ? $category->photo : '../../models/images/default.jpg' ?>" class="card-img-top img-fluid category-image" alt="<?= $category->name ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $category->description ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($category->items as $item) { ?>
                                <?php } ?>
                            </ul>
                            <div class="card-body">
                                <a href="./index.php" class="card-link">Get back to all categories</a>
                                <a href="../../views/items/create.php?category_id=<?= $_GET['id'] ?>" class="btn btn-success">Create Item</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <form method="post" class="d-flex">
                        <input class="form-control" type="search" name="search" placeholder="Look for a product" aria-label="Search" style="width: 100%;" value="<?= $_GET['search'] ?? '' ?>">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <?php if (isset($_GET['search'])) : ?>
                        <a href="./show.php?id=<?= $_GET['id'] ?>" class="btn btn-warning">Clear Search</a>
                    <?php endif; ?>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <form method="get" action="" class="form-inline">
                            <div class="input-group input-group-sm">
                                <label class="input-group-text" for="sort">Sort by:</label>
                                <select name="sort" id="sort" class="form-select form-select-sm">
                                    <option value="default" <?php echo ($sort == 'default') ? 'selected' : ''; ?>>Default</option>
                                    <option value="price_asc" <?php echo ($sort == 'price_asc') ? 'selected' : ''; ?>>Price: Low to High</option>
                                    <option value="price_desc" <?php echo ($sort == 'price_desc') ? 'selected' : ''; ?>>Price: High to Low</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="bi bi-arrow-up"></i>
                                    <i class="bi bi-arrow-down"></i>
                                </button>
                            </div>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($category->items as $item) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= $item->photo ? $item->photo : '../../models/images/default.jpg' ?>" class="card-img-top img-fluid" alt="<?= $item->title ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item->title ?></h5>
                                    <p class="card-text"><?= $item->description ?></p>
                                    <p class="card-text">Price: $<?= $item->price ?></p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                    <!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $item->id ?>">
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../components/footer.php";
    ?>
</body>

</html>