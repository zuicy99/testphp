<?php
include('./inc/dbconfig.php');
include('./inc/member.php');

$id = 'test02';
$mem=new Member($db);

// if($mem->id_exists($id)){
//     echo '존재함';
// }else{
//     echo '없음';
// }

// $member = new Member($db);
// $member->id_exists('test');
?>