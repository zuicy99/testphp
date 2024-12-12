<?php
$id = (isset($_POST['id']) && $_POST['id'] != "" ? $_POST['id'] : "");
$pw = (isset($_POST['pw']) && $_POST['pw'] != "" ? $_POST['pw'] : "");

if($id == ""){
  $arr = ["result" => "empty_id"];
  die(json_encode($arr));
}

if($pw == ""){
    $arr = ["result" => "empty_pw"];
    die(json_encode($arr));
  }

include "../inc/dbconfig.php";
include "../inc/addMember.php";

$member = new addMember($db);
$isLoggedIn = $member->login($id, $pw);

if ($isLoggedIn) {
    session_start();
    $_SESSION['session_id'] = $id;
    $arr = ["result" => "login_success"];
} else {
    $arr = ["result" => "login_fail"];
}

die(json_encode($arr));

?>

