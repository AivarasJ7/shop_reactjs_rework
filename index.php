<?php
header("Location: ./views/categories");
die;
?>

<!-- <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_11_23_shop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM categories; ";
        $result = $conn->query($sql);
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    while ($row = $result->fetch_assoc()) {
        echo "<p>id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["description"] . "</p>";
    }

    $conn->close();
    ?>
</body>

</html> -->