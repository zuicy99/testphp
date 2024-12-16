
<?php
include('header.php');
?>

<script src="./JS/member_input.js"></script>

<main>
    <h1>회원가입</h1>

    <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off" action="page/member_process.php">
        <input type="hidden" name="mode" value="input" id="mode">
        <input type="hidden" name="id_check" value="0" id="id_check">
        <input type="hidden" name="phone_check" value="0" id="phone_check">
        <div style="display: flex; flex-direction: column; max-width: 300px; gap: 10px;">
        
        <input type="text" name="id" id="f_id" placeholder="아이디">
        <button type="button" id="btn_id_check">중복확인</button>

        <input type="password" name="pw" id="f_pw" placeholder="비밀번호">
        <input type="password" name="pw_check" id="f_pw_check" placeholder="비밀번호 확인">

        <input type="text" name="name" id="f_name" placeholder="이름">
        <input type="text" name="phone" id="f_phone" placeholder="전화번호">
        <button type="button" id="btn_phone_check">중복확인</button>

        <div style="display: flex;">
            <div>
                <label for="f_user_icon">프로필 이미지</label>
                <input type="file" name="user_icon" id="f_user_icon" placeholder="프로필 이미지">
            </div>
            <img src="" alt="" id="f_user_icon_img" style="width: 100px; height: 100px;">
        </div>


        <button type="button" id="btn_submit">회원가입</button>
        </div>
    </form>
</main>

