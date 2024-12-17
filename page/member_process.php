<?php
include('../inc/dbconfig.php');
include('../inc/member.php');

$mem = new Member($db);

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';
$phone = (isset($_POST['phone']) && $_POST['phone'] != '') ? $_POST['phone'] : '';
$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$user_icon = (isset($_POST['user_icon']) && $_POST['user_icon'] != '') ? $_POST['user_icon'] : '';

$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

// 아이디 중복
if ($mode == 'id_check') {
    if ($id == '') {
        $result = 'empty_id';
        $message = '아이디를 입력해주세요.';
    }
    if ($mem->id_exists($id)) {
        $result = 'fail';
        $message = '이미 사용중인 아이디입니다.';
    } else {
        $result = 'success';
        $message = '사용 가능한 전화번호입니다.';
    }
    echo json_encode(['result' => $result, 'message' => $message]);
    exit;

    // 전화번호 중복
} else if ($mode == 'phone_check') {
    if ($phone == '') {
        $result = 'empty_phone';
        $message = '전화번호를 입력해주세요.';
    }
    if ($mem->phone_exists($phone)) {
        $result = 'fail';
        $message = '이미 사용중인 전화번호입니다.';
    } else {
        $result = 'success';
        $message = '사용 가능한 전화번호입니다.';
    }
    echo json_encode(['result' => $result, 'message' => $message]);
    exit;
} else if ($mode == 'input') {

    $tmparr = explode('.', $_FILES['user_icon']['name']);
    $ext = end($tmparr);
    $user_icon = $id . '.' . $ext;

    $user_icon = '';
    //프로필 이미지 처리
    if (isset($_FILES['user_icon']) && $_FILES['user_icon']['name'] != '') {
        $tmparr = explode('.', $_FILES['user_icon']['name']);
        $ext = end($tmparr);
        $user_icon = $id . '.' . $ext;
        copy($_FILES['user_icon']['tmp_name'], '../data/profile/' . $user_icon);
    }

    $arr = [
        'id' => $id,
        'pw' => $pw,
        'name' => $name,
        'phone' => $phone,
        'user_icon' => $user_icon,
    ];
    $mem->input($arr);

    echo "
<script>
    alert('회원가입이 완료되었습니다.');
    location.href='../member_success.php';
</script>
";

} else if ($mode == 'edit') {
    //프로필 이미지 처리
    $old_user_icon = (isset($_POST['old_user_icon']) && $_POST['old_user_icon'] != '') ? $_POST['old_user_icon'] : '';

    if (isset($_FILES['user_icon']) && $_FILES['user_icon']['name'] != '') {

        $file_path = '../data/profile/' . $old_user_icon;

        if ($old_user_icon != '' && file_exists($file_path)) {
            unlink($file_path);
        } else {
            echo "파일이 존재하지 않거나 이미 삭제되었습니다: " . $file_path;
        }
        
        $tmparr = explode('.', $_FILES['user_icon']['name']);
        $ext = end($tmparr);
        $user_icon = $id . '.' . $ext;
        copy($_FILES['user_icon']['tmp_name'], '../data/profile/' . $user_icon);

        $old_user_icon = $user_icon;
    }

    session_start();
    $arr = [
        'id' => $_SESSION['ses_id'],
        'pw' => $pw,
        'name' => $name,
        'phone' => $phone,
        'user_icon' => $old_user_icon,
    ];
    $mem->edit($arr);

    echo "
    <script>
        alert('회원정보가 수정되었습니다.');
        // self.location.href='../index.php';
    </script> ";

}


?>