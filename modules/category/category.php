<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';

class Category
{
    private $db;
    private $table_name = "product_category";

    public $category_name;
    public $description;

    public function __construct()
    {
        $this->db = \Database::getInstance();
    }

    public function insert($category_name, $desc)
    {
        $sql = "INSERT INTO {$this->table_name} SET 
                category_name=:category_name,
                description=:description";
        $query = $this->db->prepare($sql);

        $this->category_name = $category_name;
        $this->description = $desc;

        $query->bindParam(":category_name", $this->category_name);
        $query->bindParam(":description", $this->description);

        if($query->execute())
        {
            return true;
        }
        return false;
    }

    public function select()
    {
        $sql = "SELECT * FROM {$this->table_name}";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $query->execute();
        return $query;
    }

    public function getAssoc()
    {
        $query = $this->select();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }

}