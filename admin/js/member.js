document.addEventListener("DOMContentLoaded", () => {
  const btn_mem_deletes = document.querySelectorAll(".btn_mem_delete");
  btn_mem_deletes.forEach((box) => {
    box.addEventListener("click", () => {
      if (confirm("삭제하시겠습니까?")) {
        // data-idx="1"
        const idx = box.dataset.idx;
        const xhr = new XMLHttpRequest();

        const formData = new FormData();
        formData.append("idx", idx);

        xhr.open("POST", `./member_del.php`, true);
        xhr.send(formData);

        xhr.onload = () => {
          if (xhr.status == 200) {
            const data = JSON.parse(xhr.responseText);
            if (data.result == "success") {
              alert("삭제되었습니다.");
              location.reload();
            } else {
              alert("삭제실패");
            }
          } else {
            alert("통신실패");
          }
        };
      } else {
        alert("취소되었습니다.");
      }
    });
  });

  const btn_mem_edit = document.querySelectorAll(".btn_mem_edit");
  btn_mem_edit.forEach((box) => {
    box.addEventListener("click", () => {
      alert("수정");
      const idx = box.dataset.idx;
      self.location.href = `./member_edit.php?idx=${idx}`;
    });
  });
});
