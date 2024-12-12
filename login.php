<?php
include "header.php";
?>
    <script src="JS/login.js"></script>
    <main id="main" class="container">
        <h1>로그인</h1>
        <div>       
            <div class="login___form btStyle bmStyle">
                <form action="page/login_process.php" method="post">
                        <div>
                            <input type="text" id="id" class="inputStyle" name= "id" placeholder="아이디" required>
                            <input type="password" id="pw" class="inputStyle" name= "pw" placeholder="비밀번호" required>
                        </div>
                        
                        <button type="button" id="btn_login">로그인</button>
                </form>
            </div>
            <div class="login_footer">
                <ul class="listStyle">
                    <li> <a href="signup.php">회원가입</a></li>
                </ul>
            </div>
        </div>
    </main>



