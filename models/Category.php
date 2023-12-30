<?php
class Category
{
    public $id;
    public $name;
    public $description;
    public $photo;

    public function __construct($id = 0, $name = "", $description = "", $photo = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->photo = $photo;
    }

    public static function all()
    {
        $categories = [];
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $result = $db->query("SELECT * from categories");
        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        }
        $db->close();
        return $categories;
    }

    public static function find($id)
    {
        $category = new Category();
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "SELECT * from categories where id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $category = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        }
        $db->close();

        return $category;
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "INSERT INTO `categories`(`name`, `description`) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $this->name, $this->description);
        $stmt->execute();
        $db->close();
    }

    public function update()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "UPDATE `categories` SET `name`= ?,`description`= ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $this->name, $this->description, $this->id);
        $stmt->execute();
        $db->close();
    }


    public static function destroy($id)
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "DELETE FROM `categories` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $db->close();
    }
}
