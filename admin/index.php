<?php
// include "./inc_common.php";
session_start();
$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != "") ? $_SESSION['ses_id'] : "";
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != "") ? $_SESSION['ses_level'] : "";

if($ses_id == "" && $ses_level != 10){
    echo "<script>alert('접근불가 (관리자)'); self.location.href = '../index.php';</script>";
}
include "./header.php";
include "./inc_common.php";
include "../inc/dbconfig.php";
print_r($_SESSION);

?>


<main>
    <h1>관리자메인페이지</h1>
</main>