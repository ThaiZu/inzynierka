<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/login/login.php';

$login = $_POST['login'];
$passwd = $_POST['password'];

$role = new \Login\Login();
if($role->validate($login, $passwd) == true)
{
    $_SESSION['user'] = $login;
    $_SESSION['role'] = $role->getRole($login);
    $_SESSION['logged'] = true;


    if($role->getRole($login) == "ROLE_BOSS")
    {
        //echo "Location:{$_SERVER['DOCUMENT_ROOT']}/inzynierka/public/boss/index.php";
        //header("Location:../../public/boss/index.php");
        header("Location://{$_SERVER['HTTP_HOST']}/inzynierka/public/boss/index.php");
    }
}