<?php
session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');


require_once "../inc/config/conn.php";
$sql = mysqli_query($conn, "SELECT * FROM neworders WHERE `id` > {$_SESSION['id']}");
while($row=$sql->fetch_assoc()) {
    $name = $row['name'];
    echo "data: new order is {$name}\n\n";

    if($_SESSION["id"] < $row["id"]){
        $_SESSION["id"] = $row["id"];
    }
}
flush();

?>