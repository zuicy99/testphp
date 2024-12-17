<?php
$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "testphp";

try{
$db= new PDO("mysql:host={$servername}; dbname={$dbname}", username: $dbuser, password: $dbpassword);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 오류 출력
$sql = "SELECT * FROM add_member WHERE id =:id";

} catch(PDOException $e){
    echo $e->getMessage();
}
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT'].'/testphp');
define("ADMIN_ROOT", DOCUMENT_ROOT . '/admin');
define("DATA_DIR", DOCUMENT_ROOT . '/data');
define("PROFILE_DIR", DATA_DIR . '/profile');
?>