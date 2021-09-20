<?php
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/login/login.php';

$login = $_POST['login'];
$passwd = $_POST['password'];

$role = new \Login\Login();
if($role->validate($login, $passwd) == true)
{
    echo $role->getRole($login);
}