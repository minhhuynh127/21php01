<?php
$connect = new mysqli('localhost', 'root', '', 'my_username');
mysqli_set_charset($connect, "utf8");
if($connect->connect_error) {
    var_dump($connect->$connect_error);
    die();
}
$id_delete = $_GET['id'];
echo $id_delete;
$sql = "DELETE FROM news WHERE id = $id_delete";
$connect->query($sql);
header('Location: list_news.php');