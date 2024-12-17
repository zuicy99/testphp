<?php
session_start();
$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != "") ? $_SESSION['ses_level'] : "";

if ($ses_id == '') {
    echo "<script>alert('로그인 후 이용해주세요'); self.location.href='./index.php';</script>";
    exit;
}

include('./inc/dbconfig.php');
include('./inc/member.php');

$mem = new Member($db);
$memArr = $mem->getInfo($ses_id);

print_r($memArr);


include('header.php');
?>

<script src="./JS/mypage.js"></script>

<main>
    <h1>회원정보 수정</h1>

    <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off"
        action="page/member_process.php">
        <input type="hidden" name="mode" value="edit" id="edit">
        <input type="hidden" name="phone_check" value="0" id="phone_check">
        <input type="hidden" name="old_phone" value="<?= $memArr['phone']; ?>" id="old_phone">
        <input type="hidden" name="old_user_icon" value="<?= $memArr['user_icon']; ?>" id="old_user_icon">
        <div style="display: flex; flex-direction: column; max-width: 300px; gap: 10px;">

            <label for="f_id">아이디</label>
            <input type="text" name="id" id="f_id" placeholder="아이디" readonly value="<?= $memArr['id']; ?>">

            <label for="f_pw">비밀번호</label>
            <input type="password" name="pw" id="f_pw" placeholder="비밀번호" >

            <label for="f_pw_check">비밀번호 확인</label>
            <input type="password" name="pw_check" id="f_pw_check" placeholder="비밀번호 확인">

            <label for="f_name">이름</label>
            <input type="text" name="name" id="f_name" placeholder="이름" value="<?= $memArr['name']; ?>">

            <label for="f_phone">전화번호</label>
            <input type="text" name="phone" id="f_phone" placeholder="전화번호" value="<?= $memArr['phone']; ?>">
            <button type="button" id="btn_phone_check">중복확인</button>

            <div style="display: flex;">
                <div>
                    <label for="f_user_icon">프로필 이미지</label>
                    <input type="file" name="user_icon" id="f_user_icon" placeholder="프로필 이미지">
                </div>

                <?php if($memArr['user_icon'] != ''){ ?>
                <img src="data/profile/<?= $memArr['user_icon']; ?>" alt="" id="f_user_icon_img" style="width: 100px; height: 100px;">
                <?php } else { ?>
                <img src="" alt="" id="f_user_icon_img" style="width: 100px; height: 100px;">
                <?php } ?>
            </div>


            <button type="button" id="btn_submit">정보수정</button>
        </div>
    </form>
</main>