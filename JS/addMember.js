document.addEventListener("DOMContentLoaded", function () {
  const btn_id_check = document.querySelector("#btn_id_check");
  btn_id_check.addEventListener("click", () => {
    const id = document.querySelector("#id").value;
    if (id.length == "") {
      alert("아이디를 입력해주세요.");
      return false;
    }

    if (id.length < 3) {
      alert("아이디는 3글자 이상이어야 합니다.");
      return false;
    }

    const formData = new FormData();
    formData.append("id", id);
    formData.append("mode", "id_check");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../page/signup.php", "true");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(formData);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        console.log(data);
        if (data.result == "success") {
          const message = JSON.stringify("사용 가능한 아이디");
          alert(JSON.parse(message));
        } else if (data.result == "fail") {
          const message = JSON.stringify("이미 사용중인 아이디");
          alert(JSON.parse(message));
          id.value = "";
        }
      }
    };
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const btn_add_member = document.querySelector("#btn_add_member");
  btn_add_member.addEventListener("click", () => {
    const id = document.querySelector("#id").value;
    const pw = document.querySelector("#pw").value;
    const name = document.querySelector("#name").value;
    const phone = document.querySelector("#phone").value;
    if (
      id.length == "" ||
      pw.length == "" ||
      name.length == "" ||
      phone.length == ""
    ) {
      alert("모든 항목을 입력해주세요.");
      return false;
    }

    const formData = new FormData();
    formData.append("id", id);
    formData.append("pw", pw);
    formData.append("name", name);
    formData.append("phone", phone);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../page/signup.php", "true");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(formData);

    xhr.onload = () => {
      if (xhr.status == 200) {
        // const data = JSON.parse(xhr.responseText);
        const data = xhr.responseText;
        console.log(data);
        if (data.result == "success") {
          location.href = "./login.php";
        } else if (data.result == "fail") {
          id.value = "";
        }
      }
    };
  });
});
