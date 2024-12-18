<?php
session_start();
$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';
$ses_level = (isset($_SESSION['ses_level']) && $_SESSION['ses_level'] != "") ? $_SESSION['ses_level'] : "";

if ($ses_id == '') {
    echo "<script>alert('로그인 후 이용해주세요'); self.location.href='./index.php';</script>";
    exit;
}

include('./inc/dbconfig.php');
include('./inc/board.php');


$board = new Board($db);
$idx = (isset($_GET['idx']) && $_GET['idx'] != "") ? $_GET['idx'] : "";
// 여기 오류임
$boardArr = $board->getBoardInfo($idx);

print_r($boardArr);
include('header.php');
?>

<script src="./JS/board_input.js"></script>
<main id="main" class="container">
    <h3>게시판 수정</h3>
    <div  aria-labelledby="boardCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off" action="page/board_create.php">
            <input type="hidden" name="id" id="id" value="<?=$ses_id?>">
            <input type="hidden" name="idx" id="idx" value="<?=$boardArr['idx']?>">
            <input type="hidden" name="mode" value="input" id="mode">
            
            <div class="modal-body">
                <div class="mb-3">
                    <label for="writer" class="form-label">작성자</label>
                    <input type="text" class="form-control" name="writer" id="writer" placeholder="제목을 입력하세요" value="<?=$boardArr['writer']?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    <input type="text"class="form-control" name="title" id="title" placeholder="제목을 입력하세요" value="<?=$boardArr['title']?>">
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
