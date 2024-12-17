<?php
session_start();

$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != "") ? $_SESSION['ses_id'] : "";
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != "") ? $_SESSION['ses_level'] : "";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php입니당</title>
</head>

<body>
    <header>
        <h3>이동하기(관리자)</h3>
        <!-- <a href="board.php" nav-link>게시판</a> -->
        <a href="../admin/index.php" nav-link>홈으로</a>
        <a href="mypage.php" nav-link>마이페이지</a>
        
      
        <a href="member.php" nav-link>회원관리</a>
        <a href="./page/logout.php" nav-link>로그아웃</a>

        <a href="imsi.php" nav-link>테스트</a>

    </header>
</body>

</html>