<?php
session_start();

$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != "") ? $_SESSION['ses_id'] : "";
include "header.php";
?>


<main>
    <h1>메인페이지</h1>
</main>


