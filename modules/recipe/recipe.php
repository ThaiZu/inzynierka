<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';

class Recipe
{
    private $db;
    private $table_name = "recipe";

    public $id_menu_pos;
    public $id_product;
    public $quantity;
    public $unit;

    public function __construct()
    {
        $this->db = \Database::getInstance();
    }


}