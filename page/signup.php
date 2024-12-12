<?php
include('../inc/addMember.php');

  
?>



<script src="../JS/addMember.js"></script>

<main>
    <h1>회원가입</h1>

    <div style="display: flex; flex-direction: column; max-width: 300px; gap: 10px;">
    <input type="text" name="id" id="id" placeholder="아이디">
    <button type="button" id="btn_id_check">중복확인</button>
    <input type="password" name="pw" id="pw" placeholder="비밀번호">
    <!-- <input type="password" name="pw_check" id="pw_check" placeholder="비밀번호 확인"> -->

    <input type="text" name="name" id="name" placeholder="이름">
    <input type="text" name="phone" id="phone" placeholder="전화번호">
    <button type="submit" id="btn_add_member">회원가입</button>
    </div>
</main>

