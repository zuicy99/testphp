document.addEventListener("DOMContentLoaded",()=>{
    const btn_login = document.querySelector('#btn_login');
    btn_login.addEventListener('click',()=>{
       const f_id = document.querySelector('#f_id');
       if(f_id.value == ''){
        alert('아이디를 입력해주세요');
        return false;
       }
       const f_pw = document.querySelector('#f_pw');
       if(f_pw.value == ''){
        alert('비밀번호를 입력해주세요');
        return false;
       }


          // ajax 통신
          const f1 = new FormData();
          f1.append('id',f_id.value);
          f1.append('pw',f_pw.value);
          const xhr = new XMLHttpRequest()
          xhr.open("post", "./page/login_process.php", true)
          xhr.send(f1)
          xhr.onload = () => {
          if(xhr.status == 200) {
            console.log(xhr.responseText);
            const data = JSON.parse(xhr.responseText);
            if(data.result == 'login_fail') {
                alert('아이디 또는 비밀번호를 확인해주세요.');
                return false;
              }else if(data.result == 'login_success') {
                alert('로그인 성공')
                self.location.href = 'index.php';
              }
            
             
          } else {
            alert('오류가 발생했습니다.');
            return false;
          }
          
          }


    });
});