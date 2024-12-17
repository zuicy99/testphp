<?php
session_start();


$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != "") ? $_SESSION['ses_id'] : "";
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != "") ? $_SESSION['ses_level'] : "";
include "header.php";
print_r($_SESSION);
?>


<main>
    <h1>메인페이지</h1>
</main>