<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/category/category.php';


class Unit extends Category
{
    private $db;
    private $table_name = "unit";

    public $unit_name;

    public function __construct()
    {
        $this->db = \Database::getInstance();
    }

    public function select()
    {
        $sql = "SELECT * FROM {$this->table_name}";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $query->execute();
        return $query;
    }



}