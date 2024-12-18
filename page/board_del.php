<?php
include "../inc/dbconfig.php";
include "../inc/board.php";

$idx = (isset($_POST['idx']) && $_POST['idx'] != "") ? $_POST['idx'] : "";

if($idx == ""){
    $arr = ['result' => 'empty_id'];
    die(json_encode($arr));
}else{
    
}

$board = new Board($db);
$board->board_del($idx);
$arr = ["result" => "success"];
die(json_encode($arr));

?>