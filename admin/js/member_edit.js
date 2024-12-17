document.addEventListener("DOMContentLoaded", () => {
  // 전화번호 중복체크
  const btn_phone_check = document.querySelector("#btn_phone_check");
  btn_phone_check.addEventListener("click", () => {
    const f = document.input_form;
    if (f.old_phone.value == f.phone.value) {
      alert("이전과 같은 전화번호입니다.");
      return false;
    }
    if (f.phone.value == "") {
      alert("전화번호를 입력해주세요");
      return false;
    }
    // ajax 통신
    const f1 = new FormData();
    f1.append("phone", f.phone.value);
    f1.append("mode", "phone_check");

    const xhr = new XMLHttpRequest();
    xhr.open("post", "../page/member_process.php", true);
    xhr.send(f1);
    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        if (data.result == "success") {
          alert("사용이 가능한 전화번호입니다");
          document.querySelector("#phone_check").value = "1";
        } else if (data.result == "fail") {
          alert("이미 사용중인 전화번호입니다. 다른 전화번호를 입력해 주세요.");
          document.querySelector("#phone_check").value = "0";
        } else if (data.result == "empty_phone") {
          alert("전화번호를 입력해주세요.");
          f_phone.focus();
          f_phone.value = "";
        }
      }
    };
  });

  const f_user_icon = document.querySelector("#f_user_icon");
  f_user_icon.addEventListener("change", (e) => {
    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function (e) {
      const f_user_icon_img = document.querySelector("#f_user_icon_img");
      f_user_icon_img.setAttribute("src", e.target.result);
    };
  });

  // 회원가입 버튼
  const btn_submit = document.querySelector("#btn_submit");
  btn_submit.addEventListener("click", () => {
    const f = document.input_form;

    if (f.pw.value != f.pw_check.value) {
      alert("비밀번호가 일치하지 않습니다");
      f.pw.focus();
      f.pw.value = "";
      f.pw_check.value = "";
      return false;
    }

    if (f.phone.value == "") {
      alert("전화번호를 입력해주세요");
      return false;
    }

    // 폰번호 변경시
    if (f.old_phone.value != f.phone.value) {
      if (f.phone_check.value == 0) {
        alert("전화번호 중복확인을 해주세요");
        return false;
      }
    }

    if (f.name.value.length == 0) {
      alert("이름을 입력해주세요");
      return false;
    }

    f.submit();
  });
});
