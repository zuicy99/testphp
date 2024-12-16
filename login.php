<?php
include "header.php";
?>
<script src="./JS/login2.js"></script>
    <main id="main" class="container">
        <h1>로그인</h1>
        <div>       
            <div class="login___form btStyle bmStyle">
                <form action="" method="post">
                        <div>
                            <input type="text" id="f_id" class="inputStyle" placeholder="아이디" required>
                            <input type="password" id="f_pw" class="inputStyle" placeholder="비밀번호" required autocomplete="off">
                        </div>
                        
                        <button type="button" id="btn_login">로그인</button>
                </form>
            </div>
            <div class="login_footer">
                <ul class="listStyle">
                    <li> <a href="signup.php">회원가입 하러가기</a></li>
                </ul>
            </div>
        </div>
    </main>



