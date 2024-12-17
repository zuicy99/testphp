<?php

include('../admin/inc_common.php');
include('../../inc/dbconfig.php');
include('../../inc/member.php');

$mem = new Member($db);

$idx = (isset($_POST['idx']) && $_POST['idx'] != '') ? $_POST['idx'] : '';
$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$level = (isset($_POST['level']) && $_POST['level'] != '') ? $_POST['level'] : '';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';
$phone = (isset($_POST['phone']) && $_POST['phone'] != '') ? $_POST['phone'] : '';
$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$user_icon = (isset($_POST['user_icon']) && $_POST['user_icon'] != '') ? $_POST['user_icon'] : '';
$old_user_icon = (isset($_POST['old_user_icon']) && $_POST['old_user_icon'] != '') ? $_POST['old_user_icon'] : '';

    if (isset($_FILES['user_icon']) && $_FILES['user_icon']['name'] != '') {
        $new_user_icon = $_FILES['user_icon'];
        $old_user_icon = $mem->profile_upload($id, $new_user_icon, $old_user_icon);
    }

    $arr = [
        'idx' => $idx,
        'id' => $id,
        'pw' => $pw,
        'name' => $name,
        'phone' => $phone,
        'user_icon' => $old_user_icon,
        'level' => $level,
    ];
    $mem->edit($arr);

    echo "
    <script>
        alert('회원정보가2 수정되었습니다.');
        self.location.href='../member.php';
    </script> ";




?>