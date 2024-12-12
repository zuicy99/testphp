<?php
include "header.php";
?>
<main id="main" class="container">
    <h1>게시판 작성</h1>
    <form action="page/board_process.php" method="post">
        <input type="text" name="title" placeholder="제목">
        <input type="text" name="content" placeholder="내용">
        <button type="submit">작성</button>
    </form>
</main>
