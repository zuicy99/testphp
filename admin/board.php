<?php
include "header.php";
include "inc_common.php";
include "../inc/dbconfig.php";
include "../inc/board.php";
// include "./js/member.js";

$sql = "SELECT * FROM member_mng WHERE 1";

$board = new Board($db);
$boardArr = $board->list();
?>

<script src="./js/board_input.js"></script>
<main id="main" class="container">
    <h3>게시판 목록</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>번호</th>
                <th>작성자</th>
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
                    <button type="button" class="btn btn-primary btn_mem_edit" data-idx="<?=$row['idx']?>">수정</button>
                    <button type="button" class="btn btn-danger btn_mem_delete" data-idx="<?=$row['idx']?>">삭제</button>
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
            <div class="modal-header">
                <h5 class="modal-title" id="boardCreateLabel">게시판 추가</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="writer" class="form-label">작성자</label>
                    <input type="text" class="form-control" name="writer" id="writer" placeholder="제목을 입력하세요">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="제목을 입력하세요">
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
    </div>
</div>