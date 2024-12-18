document.addEventListener("DOMContentLoaded",()=>{
    // 작성하기 버튼
    const btn_submit = document.querySelector('#btn_board_submit');
    btn_submit.addEventListener('click',()=>{

        alert('작성완료');
        const f = document.input_form
     
        if(f.title.value == ''){
            alert('제목을 입력해주세요');
            return false;
        }
        if(f.content.value == ''){
            alert('내용을 입력해주세요');
            return false;
        }

        f.submit();


    });


    const btn_board_deletes = document.querySelectorAll(".btn_board_delete");
    btn_board_deletes.forEach((box) => {
    box.addEventListener("click", () => {
        if (confirm("삭제하시겠습니까?")) {
        // 작성자 ID와 로그인한 사용자 ID 비교
      

        // data-idx="1"
        const idx = box.dataset.idx;
        const xhr = new XMLHttpRequest();

        const formData = new FormData();
        formData.append("idx", idx);

        xhr.open("POST", `./page/board_del.php`, true);
        xhr.send(formData);

        xhr.onload = () => {
            if (xhr.status == 200) {
            const data = JSON.parse(xhr.responseText);
            if (data.result == "success") {
                alert("삭제되었습니다.");
                location.reload();
            } else {
                alert("삭제 실패");
            }
            } else {
            alert("통신 실패");
            }
        };
        } else {
        alert("취소되었습니다.");
        }
    });
    });

    
  const btn_board_edit = document.querySelectorAll(".btn_board_edit");
  btn_board_edit.forEach((box) => {
    box.addEventListener("click", () => {
      alert("수정");
      const idx = box.dataset.idx;
      self.location.href = `./board_edit.php?idx=${idx}`;
    });
  });

});

