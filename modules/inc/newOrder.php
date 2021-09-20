<?php
$name = $_POST['orderName'];
$sec = "test";
echo $sec;
if (strpos($_SERVER['HTTP_REFERER'], "?r") !== false)
    $htppPath = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], "?"));
else
    $htppPath = $_SERVER['HTTP_REFERER'];



require_once "../inc/config/conn.php";

$stmt = $conn->prepare("INSERT INTO neworders (name, item) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $sec);
if ($stmt->execute()) {
    header("Location:".$htppPath."?fa=succ");
} else {
    header("Location:".$htppPath."?fa=error");
}
$stmt->close();
$conn->close();