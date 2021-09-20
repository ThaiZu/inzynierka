<?php
//$dbhost = 'myfoodjtestowa.mysql.db';
//$dbuser = 'myfoodjtestowa';
//$dbpass = 'TestowaBaza3287';
//$dbname = 'myfoodjtestowa';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'pizzaHelper';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn)
{
    die("Could not connect: ".mysqli_error());
}
