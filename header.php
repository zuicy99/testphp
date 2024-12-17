<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php입니당</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <a href="index.php" class="nav-link text-white">홈으로</a>
                    </ul>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li><a href="imsi.php" class="nav-link text-white">테스트</a></li>
                        <?php if(isset($ses_id) && $ses_id != ""){ ?>
                        <li><a href="mypage.php" class="nav-link text-white">마이페이지</a></li>
                        <li><a href="./page/logout.php" class="nav-link text-white">로그아웃</a></li>
                        <?php } else { ?>
                        <li><a href="login.php" class="nav-link text-white">로그인</a></li>
                        <li><a href="signup.php" class="nav-link text-white">회원가입</a></li>
                        <?php } ?>

                        <?php if(isset($ses_level) && $ses_level == 10){ ?>
                        <li><a href="./admin/index.php" class="nav-link text-white">관리자모드</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        </div>
    </header>

</body>

</html>