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



require_once "../product.php";
$product = new Product();

if($product->insert('maka luksusowa', '60', '50', '1', "10.50", '1')){
    header("Location:{$htppPath}?r=succ");
} else {
    header("Location:{$htppPath}?r=error");
}