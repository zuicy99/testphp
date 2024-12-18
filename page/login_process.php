<?php
$id = (isset($_POST['id']) && $_POST['id'] != "" ? $_POST['id'] : "");
$pw = (isset($_POST['pw']) && $_POST['pw'] != "" ? $_POST['pw'] : "");



if($id == ''){
  $arr = ['result' => 'empty_id'];
  die(json_encode($arr));
}

  else if($pw == ''){
      $result = 'empty_pw';
      $message = '비밀번호를 입력해주세요.';
}

include "../inc/dbconfig.php";
include "../inc/member.php";

$mem = new Member($db);

if($mem->login($id, $pw)){
  $arr = ['result' => 'login_success'];

  $memArr = $mem->getInfo($id);

  session_start();
  $_SESSION['ses_id'] = $id;
  $_SESSION['ses_level'] = $memArr['level'];
  $_SESSION['ses_name'] = $memArr['name'];
  
}else{
  $arr = ['result' => 'login_fail'];
}
die(json_encode($arr));



?>