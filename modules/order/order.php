<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';

class Order
{
    private $db;
    private $table_name = "user";


    public $id;
    public $reservation_num;
    public $client_name;
    public $menu_pos = array();
    public $amount;


    public function __construct()
    {
        $this->db = \Database::getInstance();
    }




}
