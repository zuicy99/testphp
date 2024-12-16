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
            <a href="./page/logout.php" nav-link>로그아웃</a>
            <a href="user_board.php" nav-link>유저 목록</a>
            <a href="board.php" nav-link>게시판</a>
        <?php } else { ?>
            <a href="login.php" nav-link>로그인</a>
            <a href="signup.php" >회원가입</a>
        <?php } ?>



        <a href="imsi.php" nav-link>테스트</a>
    </header>
</body>
</html>