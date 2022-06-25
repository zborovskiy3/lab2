<?php

require_once __DIR__ . "/vendor/autoload.php";

use MongoDB\Client;

class Shop
{
    private \MongoDB\Collection $db;

    public function __construct()
    {
        $client = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->db = $client->shop->items;
    }


    public function vendor(): void
    {
        $statement = $this->db->distinct("Vendor");
        echo "<div id='content'>
    <b>Производители:</b>";
        foreach ($statement as $value) {
            echo " <br>$value";
        }
        echo "</div>";
    }

    public function absent(): void
    {
        $statement = $this->db->find(["quantity" => 0]);
        echo "<div id='content'>";
        foreach ($statement->toArray() as $data) {
            echo "<br> Название: {$data['name']} | Цена: {$data['price']} | Количество: {$data['quantity']} | Качество: {$data['quality']} ";
        }
        echo "</div>";
    }

    public function price(): void
    {
        $min = intval($_POST["minPrice"]);
        $max = intval($_POST["maxPrice"]);
        $statement = $this->db->find(["price" => ['$gte' => $min, '$lte' => $max]]);
        echo "<div id='content'>";
        foreach ($statement as $data) {
            echo "<br> Название: {$data['name']} | Цена: {$data['price']} | Количество: {$data['quantity']} | Качество: {$data['quality']} ";
        }
        echo "</div>";
    }
}