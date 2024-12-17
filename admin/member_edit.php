<?php
include "header.php";
include "inc_common.php";
include "../inc/dbconfig.php";
include "../inc/member.php"; // 회원관리
// include "./js/member.js";

$idx = (isset($_GET['idx']) && $_GET['idx'] != "") ? $_GET['idx'] : "";

if($idx == ""){
    die("<script>alert('잘못된 접근입니다.'); history.go(-1);</script>");
}

$mem = new Member($db);
$row = $mem->getInfoForm($idx);
?>

<script src="./js/member_edit.js"></script>
<main class="container" style="max-width: 800px;">
    <h3>회원정보수정</h3>

    <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off"
        action="../admin/page/member_process.php">
        <input type="hidden" name="mode" value="edit" id="edit">
        <input type="hidden" name="phone_check" value="0" id="phone_check">
        <input type="hidden" name="old_phone" value="<?= $row['phone']; ?>" id="old_phone">
        <input type="hidden" name="old_user_icon" value="<?= $row['user_icon']; ?>" id="old_user_icon">

        <div class="mb-4 row">
            <label for="f_id" class="col-sm-2 col-form-label">아이디</label>
            <div class="col-sm-4">
                <input type="text" readonly class="form-control-plaintext" name="id" id="f_id"
                    value="<?= $row['id']; ?>">
            </div>
        </div>

        <div class="mb-4 row">
            <label for="f_pw" class="col-sm-2 col-form-label">비밀번호</label>
            <div class="col-sm-10">
                <input type="password" class="form-control mb-2" name="pw" id="f_pw" placeholder="비밀번호">
                <input type="password" class="form-control" name="pw_check" id="f_pw_check" placeholder="비밀번호 확인">
            </div>
        </div>

        <div class="mb-4 row">
            <label for="f_name" class="col-sm-2 col-form-label">이름</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" name="name" id="f_name" placeholder="이름"
                    value="<?= $row['name']; ?>">
            </div>
        </div>

        <div class="mb-4 row">
            <label for="f_phone" class="col-sm-2 col-form-label">전화번호</label>
            <div class="col-auto">
                <input type="text" id="f_phone" class="form-control" name="phone" value="<?= $row['phone']; ?>">
            </div>
            <div class="col-auto">
                <button type="button" id="btn_phone_check" class="btn btn-primary">중복확인</button>
            </div>
        </div>

        <div class="mb-4 row">
            <label for="formFile" class="col-sm-2 col-form-label">프로필 이미지</label>
            <div class="col-auto">
                <input class="form-control" type="file" name="user_icon" id="f_user_icon" placeholder="프로필 이미지">
            </div>
            <div class="col-auto">
                <?php if($row['user_icon'] != ''){ ?>
                <img src="../data/profile/<?= $row['user_icon']; ?>" alt="" id="f_user_icon_img"
                    style="width: 100px; height: 100px;">
                <?php } else { ?>
                <img src="" alt="" id="f_user_icon_img" style="width: 100px; height: 100px;">
                <?php } ?>
            </div>
        </div>

        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary" type="button" id="btn_submit">정보수정</button>
        </div>


    </form>
</main>