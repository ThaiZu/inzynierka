<?php
class Database{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'pizzahelper';

    protected static $db;


    private  function __construct()
    {
        try {
            self::$db = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e){
            echo "Connection Error: " . $e->getMessage();
        }
    }


    public static function getInstance(){
        if(!self::$db){
            new Database();
        }
        return  self::$db;

    }
    public function __destruct()
    {
        $db=NULL;
    }


}