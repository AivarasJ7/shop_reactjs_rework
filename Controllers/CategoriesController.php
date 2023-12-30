<?php
include_once "../../models/Category.php";
include_once "../../models/Item.php";
class CategoriesController
{

    public static function getAll()
    {
        $categories = Category::all();
        return $categories;
    }

    public static function find($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public static function store()
    {
        $category = new Category();
        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        $category->save();
    }
    public static function update($id)
    {
        $category = Category::find($id);
        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        $category->update();
    }

    public static function destroy($id)
    {
        Category::destroy($id);
    }

    public static function findWithItems($id, $searchTerm = null)
    {
        $category = new Category();
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");

        $sqlCategory = "SELECT * FROM categories WHERE id = ?";
        $stmtCategory = $db->prepare($sqlCategory);
        $stmtCategory->bind_param("i", $id);
        $stmtCategory->execute();
        $resultCategory = $stmtCategory->get_result();

        while ($rowCategory = $resultCategory->fetch_assoc()) {
            $category = new Category($rowCategory['id'], $rowCategory['name'], $rowCategory['description'], $rowCategory['photo']);
        }

        $sqlItems = "SELECT * FROM items WHERE category_id = ?";
        $params = ["i", $id];

        if ($searchTerm) {
            $sqlItems .= " AND title LIKE ?";
            $searchTerm = "%$searchTerm%";
            $params[0] .= "s";
            $params[] = $searchTerm;
        }

        $stmtItems = $db->prepare($sqlItems);
        $stmtItems->bind_param(...$params);
        $stmtItems->execute();
        $resultItems = $stmtItems->get_result();

        $items = [];
        while ($rowItem = $resultItems->fetch_assoc()) {
            $items[] = new Item($rowItem['category_id'], $rowItem['title'], $rowItem['description'], $rowItem['photo'], $rowItem['price']);
        }

        $category->items = $items;

        $db->close();

        return $category;
    }
}
