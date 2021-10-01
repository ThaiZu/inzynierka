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


$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$min_quantity = $_POST['min_quantity'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$category = $_POST['category'];


require_once "../product.php";
$product = new Product();

if($product->insert($product_name, $quantity, $min_quantity, $unit, $price, $category)){
    header("Location:{$htppPath}?r=succ");
} else {
    header("Location:{$htppPath}?r=error");
}