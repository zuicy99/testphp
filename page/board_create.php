<?php
include('../inc/dbconfig.php');
include('../inc/board.php');

$board = new Board($db);

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$writer = (isset($_POST['writer']) && $_POST['writer'] != '') ? $_POST['writer'] : '';
$title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : '';
$content = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : '';
$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';

$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

 if ($mode == 'input') {
    session_start();

    if ($title == '') {
        $arr = ['result' => 'empty_title'];
        die(json_encode($arr));
    }

    if ($content == '') {
        $arr = ['result' => 'empty_content'];
        die(json_encode($arr));
    }

    $arr = [
        'id' => $_SESSION['ses_id'],
        'writer' => $_SESSION['ses_id'],
        'title' => $title,
        'content' => $content,
    ];
    $board->board_input($arr);

    echo "
    <script>
        alert('작성이 완료되었습니다.');
        location.href='../board.php';
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
        self.location.href='../index.php';
    </script> ";

}


?>