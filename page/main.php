<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='login.php';</script>";
    exit;
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>메인 페이지</h1>
    <p>환영합니다, <?php echo htmlspecialchars($username); ?>님!</p>
    <a href="logout.php">로그아웃</a>
</body>
</html>
