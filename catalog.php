<?php require_once("product.php");

class Catalog {

    private static array $catalog = [
        "RF1" => [
            "name" => "Red Flower",
            "price" => 32.95
        ],
        "GF1" => [
            "name" => "Green Flower",
            "price" => 24.95
        ],
        "BF1" => [
            "name" => "Blue Flower",
            "price" => 7.95
        ]
    ];

    public static function get_catalog() {
        return self::$catalog;
    }
}