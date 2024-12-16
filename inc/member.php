<?php

class Member
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //아이디 중복확인
    public function id_exists($id)
    {
        $sql = "SELECT * FROM member WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() ? true : false;
    }

    //전화번호 중복확인
    public function phone_exists($phone)
    {
        $sql = "SELECT * FROM member WHERE phone = :phone";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        return $stmt->rowCount() ? true : false;
    }

    public function input($marray)
    {
        //단반향 암호화
        $new_pw = password_hash($marray['pw'], PASSWORD_DEFAULT);
        //   var_dump($marray);
        $sql = "INSERT INTO member(id,pw,name,phone,user_icon, create_at,idx) VALUES (:id,:pw,:name,:phone,:user_icon, now(),0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $marray['id']);
        $stmt->bindParam(':pw', $new_pw);
        $stmt->bindParam(':name', $marray['name']);
        $stmt->bindParam(':phone', $marray['phone']);
        $stmt->bindParam(':user_icon', $marray['user_icon']);
        $stmt->execute();
    }

    public function login($id, $pw)
    {
        $sql = "SELECT pw FROM member WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if($stmt->rowCount()){
            $row= $stmt->fetch();
            if(password_verify($pw, $row['pw'])){

                //로그인 시간 업데이트
                $sql = "UPDATE member SET login_dt = now() WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
       
    }

    public function logout()
    {
        session_start();
        session_destroy();
        die("<script>self.location.href = '../index.php';</script>");
       
    }
}

?>