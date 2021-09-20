<?php
namespace Login;
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/config/database.php';

class Login
{
    private $db;
    private $table_name = "user";
    private $passwd;

    public $login;
    public $role;
    public $name;



    public function __construct()
    {
        $this->db = \Database::getInstance();
    }

    public function validate($login, $passw)
    {
        $sql = "SELECT login, password 
                FROM {$this->table_name} 
                WHERE login=:login AND password=:password";
        $query = $this->db->prepare($sql);

        $this->login = htmlspecialchars($login, ENT_QUOTES, "UTF-8");
        $this->passwd = htmlspecialchars($passw, ENT_QUOTES, "UTF-8");

        $query->bindParam(":login", $this->login);
        $query->bindParam(":password", $this->passwd);

        if($query->execute())
        {
            return true;
        }
        return false;
    }

    public function selectRole($login)
    {
        $sql = "SELECT role 
                FROM {$this->table_name}
                WHERE login=:login";
        $query = $this->db->prepare($sql);

        $this->login = htmlspecialchars($login, ENT_QUOTES,"UTF-8");

        $query->bindParam(":login", $this->login);
        if($query->execute())
        {
            return $query;
        }
        return false;
    }

    public function getRole($login)
    {
        $query = $this->selectRole($login);

        $role = $query->fetch();

        $role = $role['role'];
        return $role;
    }


}