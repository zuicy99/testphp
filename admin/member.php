<?php
include "header.php";
include "inc_common.php";
include "../inc/dbconfig.php";
include "../inc/member.php"; // 회원관리
// include "./js/member.js";

$sql = "SELECT * FROM member WHERE 1";


$mem = new member($db);
$memArr = $mem->list();

?>

<script src="./js/member.js"></script>
<main id="main" class="container">
    <h1>유저 목록</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>번호</th>
                <th>아이디</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>회원가입 날짜</th>
                <th>로그인 시간</th>
                <th>회원등급</th>
                <th>관리</th>
            </tr>
        </thead>



        <?php foreach($memArr as $row): ?>
        <tbody>
            <tr>
                <td><?=$row['idx']?></td>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['create_at']?></td>
                <td><?=$row['login_dt']?></td>
                <td><?=$row['level']?></td>
                <td>
                    <button type="button" id="member_edit" class="btn_primary" onclick="edit(<?=$row['idx']?>)">수정</button>
                    <button type="button" id="member_delete" class="btn_primary" onclick="delete(<?=$row['idx']?>)">삭제</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
