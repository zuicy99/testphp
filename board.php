<?php
include "header.php";

include "./inc/dbconfig.php";
include "./inc/board.php";
// include "./js/member.js";

session_start();
$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';
$ses_name = (isset($_SESSION['ses_name']) && $_SESSION['ses_name'] != "") ? $_SESSION['ses_name'] : "";


$sql = "SELECT * FROM board_mng WHERE 1";

$board = new Board($db);
$boardArr = $board->list();

print_r($_SESSION);

print_r($boardArr);
?>

<script src="./js/board_input.js"></script>
<main id="main" class="container">
    <h3>게시판 목록</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>번호</th>
                <th>id</th>
                <th>제목</th>
                <th>내용</th>
                <th>작성일</th>
                <th>관리</th>
            </tr>
        </thead>
        <?php foreach($boardArr as $row): ?>
        <tbody>
            <tr>
                <td><?=$row['idx']?></td>
                <td><?=$row['writer']?></td>
                <td><?=$row['title']?></td>
                <td><?=$row['content']?></td>
                <td><?=$row['creat_at']?></td>
                <td>
                    <?php if($row['writer'] == $ses_id): ?>
                    <button type="button" class="btn btn-primary btn_board_edit" data-idx="<?=$row['idx']?>">수정</button>
                    <button type="button" class="btn btn-danger btn_board_delete" data-idx="<?=$row['idx']?>">삭제</button>
                    <?php endif; ?>
           
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><button type="button" class="btn btn-primary btn_mem_add" data-bs-toggle="modal"
                        data-bs-target="#board_create">추가</button></td>
            </tr>
        </tfoot>
    </table>
</main>


<!-- Modal -->
<div class="modal fade" id="board_create" tabindex="-1" aria-labelledby="boardCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off" action="page/board_create.php">
            <input type="hidden" name="id" id="id" value="<?=$ses_id?>">
            <input type="hidden" name="id" id="" value="<?=$ses_id?>">
            <input type="hidden" name="mode" value="input" id="mode">
            <div class="modal-header">
                <h5 class="modal-title" id="boardCreateLabel">게시판 추가</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="writer" class="form-label">작성자</label>
                    <input type="text" class="form-control" name="writer" id="writer" placeholder="제목을 입력하세요" value="<?=$ses_id?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    <input type="text"class="form-control" name="title" id="title" placeholder="제목을 입력하세요">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">내용</label>
                    <textarea class="form-control" name="content" id="content" rows="5" placeholder="내용을 입력하세요"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='btn_close'>닫기</button>
                    <button type="button" class="btn btn-primary" id="btn_board_submit">저장</button>
                </div>
            </div>
        </form>
    </div>
</div>