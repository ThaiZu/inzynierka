<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';


class Product
{
    private $db;
    private $table_name = "products";

    public $product_name;
    public $quantity;
    public $min_quantity;
    public $id_unit;
    public $price;
    public $id_category;
    public $last_added;


    public function __construct()
    {
        $this->db = \Database::getInstance();
    }

    public function insert($product_name, $quantity, $min_quantity, $id_unit, $price, $id_category)
    {
        $sql = "INSERT INTO {$this->table_name} SET 
                product_name=:product_name,
                quantity=:quantity,
                min_quantity=:min_quantity,
                id_unit=:id_unit,
                price=:price,
                id_category=:id_category,
                last_added=DATE_FORMAT(NOW(), '%Y-%m-%d')";

        $query = $this->db->prepare($sql);

        $this->product_name = $product_name;
        $this->quantity = $quantity;
        $this->min_quantity = $min_quantity;
        $this->id_unit = $id_unit;
        $this->price = $price;
        $this->id_category = $id_category;
       // $this->last_added = date("Y-m-d");

        $query->bindParam(":product_name", $this->product_name);
        $query->bindParam(":quantity", $this->quantity);
        $query->bindParam(":min_quantity", $this->min_quantity);
        $query->bindParam(":id_unit", $this->id_unit);
        $query->bindParam(":price", $this->price);
        $query->bindParam(":id_category", $this->id_category);
        //$query->bindParam(":last_added", $this->last_added);

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