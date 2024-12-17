<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php입니당</title>
</head>
<body>
    <header>
        <h1>이동하기</h1>

        <?php if(isset($ses_id) && $ses_id != ""){ ?>
            <a href="index.php" nav-link>홈으로</a>
            <a href="board.php" nav-link>게시판</a>
            <a href="mypage.php" nav-link>마이페이지</a>
            <a href="./page/logout.php" nav-link>로그아웃</a>
            <?php if($ses_level == 10){ ?>
                <a href="./admin/index.php" nav-link>관리자</a>
                <!-- <a href="user_board.php" nav-link>회원관리</a> -->
            <?php } ?>
        <?php } else { ?>
            <a href="login.php" nav-link>로그인</a>
            <a href="signup.php" >회원가입</a>
        <?php } ?>



        <a href="imsi.php" nav-link>테스트</a>
    </header>
</body>
</html>