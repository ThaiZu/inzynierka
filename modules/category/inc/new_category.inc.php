<?php
session_start();


if(empty($_SERVER['HTTP_REFERER'])) {
    $htppPath = "//{$_SERVER['HTTP_HOST']}/inzynierka/public/index.html";
} else {
    if (strpos($_SERVER['HTTP_REFERER'], "?r") !== false) {
        $htppPath = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], "?"));
    } else {
        $htppPath = $_SERVER['HTTP_REFERER'];
    }
}

if(!isset($_SESSION['logged']))
{
    echo "XD";
    header("Location://{$_SERVER['HTTP_HOST']}/inzynierka/public/index.html");
    exit();
}
if(!isset($_POST['submit']))
{
    header("Location:{$htppPath}");
    echo "Location";
    exit();
}

$category_name = @$_POST['category_name'];
$desc = !empty($_POST['desc']) ? $desc = $_POST['desc'] : $desc = "";

require_once "../category.php";
$category = new Category();

if($category->insert($category_name, $desc)){
    header("Location:{$htppPath}?r=succ");
} else {
    header("Location:{$htppPath}?r=error");

}




