<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpsite";
$conn = new mysqli($servername, $username, $password, $dbname);

try{
$db= new PDO("mysql:host={$servername}; dbname={$dbname}", $username, $password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 오류 출력
$sql = "SELECT * FROM add_member WHERE id =:id";

} catch(PDOException $e){
    echo $e->getMessage();
}
?>