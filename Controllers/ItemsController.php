<?php
include_once "../../models/Item.php";

class ItemsController
{

    public static function getAll()
    {
        $items = Item::all();
        return $items;
    }

    public static function find($id)
    {
        $item = Item::find($id);
        return $item;
    }

    public static function store()
    {
        $item = new Item();
        $item->title = $_POST['title'];
        $item->description = $_POST['description'];
        $item->price = $_POST['price'];
        $item->category_id = $_POST['category_id'];
        $item->save();

        header("Location: ../../views/categories/show.php?id=" . $item->category_id);
    }

    public static function update($id)
    {
        $item = Item::find($id);
        $item->title = $_POST['title'];
        $item->description = $_POST['description'];
        $item->update();
    }

    public static function destroy($id)
    {
        Item::destroy($id);
    }
}
