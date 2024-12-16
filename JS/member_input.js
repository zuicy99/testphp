document.addEventListener("DOMContentLoaded",()=>{

    // 아이디 중복체크
    const btn_id_check = document.querySelector('#btn_id_check');
    btn_id_check.addEventListener('click',()=>{
      const f_id = document.querySelector('#f_id')
      if (f_id.value == ''){
        alert('아이디를 입력해주세요');
        return false;
      }

      // ajax 통신
      const f1 = new FormData();
      f1.append('id',f_id.value);
      f1.append('mode','id_check');

      const xhr = new XMLHttpRequest()
      xhr.open("post", "./page/member_process.php", true)
      xhr.send(f1)
      console.log(xhr);
      xhr.onload = () => {
        if(xhr.status == 200) {
          const data = JSON.parse(xhr.responseText)
          if(data.result == 'success') {
            alert('사용이 가능한 아이디입니다')
            document.querySelector('#id_check').value = '1';
          }else if(data.result == 'fail') {
            alert('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.')
            document.querySelector('#id_check').value = '0';
            f_id.focus();
            f_id.value = '';
          }else if(data.result == 'empty_id'){
            alert('아이디를 입력해주세요.');
            f_id.focus();
            f_id.value = '';
          }
        }
      }
    });

    // 전화번호 중복체크
    const btn_phone_check = document.querySelector('#btn_phone_check');
    btn_phone_check.addEventListener('click',()=>{
        const f_phone = document.querySelector('#f_phone')
        if (f_phone.value == ''){
        alert('전화번호를 입력해주세요');
        return false;
        }

        // ajax 통신
        const f1 = new FormData();
        f1.append('phone',f_phone.value);
        f1.append('mode','phone_check');

        const xhr = new XMLHttpRequest()
        xhr.open("post", "./page/member_process.php", true)
        xhr.send(f1)
        xhr.onload = () => {
        if(xhr.status == 200) {
            const data = JSON.parse(xhr.responseText)
            if(data.result == 'success') {
            alert('사용이 가능한 전화번호입니다')
            document.querySelector('#phone_check').value = '1';
            }else if(data.result == 'fail') {
            alert('이미 사용중인 전화번호입니다. 다른 전화번호를 입력해 주세요.')
            document.querySelector('#phone_check').value = '0';
            }else if(data.result == 'empty_phone'){
                alert('전화번호를 입력해주세요.');
                f_phone.focus();
                f_phone.value = '';
            }
        }
        }
    });



    // 회원가입 버튼
    const btn_submit = document.querySelector('#btn_submit');
    btn_submit.addEventListener('click',()=>{

        const f = document.input_form
        if(f.id.value == ''){
            alert('아이디를 입력해주세요');
            return false;
        }
        if(f.id_check.value == 0){
            alert('아이디 중복확인을 해주세요');
            return false;
        }
        if(f.pw.value == ''){
            alert('비밀번호를 입력해주세요');
            return false;
        }
        if(f.pw_check.value == ''){
            alert('비밀번호 확인을 해주세요');
            return false;
        }
        if(f.pw.value != f.pw_check.value){
            alert('비밀번호가 일치하지 않습니다');
            f.pw.focus();
            f.pw.value = '';
            f.pw_check.value = '';
            return false;
        }

        if(f.phone.value == ''){
            alert('전화번호를 입력해주세요');
            return false;
        }
        if(f.phone_check.value == 0){
            alert('전화번호 중복확인을 해주세요');
            return false;
        }

        if(f.name.value.length == 0){
            alert('이름을 입력해주세요');
            return false;
        }

        f.submit();

    });


    const f_user_icon = document.querySelector('#f_user_icon');
    f_user_icon.addEventListener('change',(e)=>{
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function(e){
            const f_user_icon_img = document.querySelector('#f_user_icon_img');
            f_user_icon_img.setAttribute('src',e.target.result);
          
        }
    });
});

