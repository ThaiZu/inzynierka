<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';

class Recipe
{
    private $db;
    private $table_name = "recipe";

    public $recipe_name;


    public function __construct()
    {
        $this->db = \Database::getInstance();
    }


}