document.addEventListener("DOMContentLoaded", () => {
  const btn_login = document.querySelector("#btn_login");
  btn_login.addEventListener("click", () => {
    const id = document.querySelector("#id").value;
    const pw = document.querySelector("#pw").value;
    if (id == "") {
      alert("아이디를 입력해주세요.");
      return false;
    }
    if (pw == "") {
      alert("비밀번호를 입력해주세요.");
      return false;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./page/login_process.php", "true");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const formData = new FormData();
    formData.append("id", id);
    formData.append("pw", pw);

    xhr.send(formData);
    xhr.onload = () => {
      if (xhr.status == 200) {
        if (xhr.responseText == "login_fail") {
          alert("아이디와 비밀번호를 확인해주세요.");
        } else if (xhr.responseText == "login_success") {
          alert("로그인 성공");
          self.location.href = "./index.php";
        }
      } else {
        alert("로그인 실패");
      }
    };
  });
});
