<?php
class Item
{
    public $category_id;
    public $title;
    public $description;
    public $photo;
    public $price;

    public function __construct($category_id = 0, $title = "", $description = "", $photo = "", $price = 0)
    {
        $this->category_id = $category_id;
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
        $this->price = $price;
    }

    public static function all()
    {
        $items = [];
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $result = $db->query("SELECT * from items");
        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['category_id'], $row['title'], $row['description'], $row['photo'], $row['price']);
        }
        $db->close();
        return $items;
    }

    public static function find($category_id)
    {
        $item = new Item();
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "SELECT * from items where category_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['category_id'], $row['title'], $row['description'], $row['photo'], $row['price']);
        }
        $db->close();

        return $item;
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $sql = "INSERT INTO `items`(`category_id`, `title`, `description`, `photo`, `price`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("isssd", $this->category_id, $this->title, $this->description, $this->photo, $this->price);
        $stmt->execute();
        $db->close();
    }
}
