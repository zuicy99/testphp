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

        if ($stmt->rowCount()) {
            $row = $stmt->fetch();
            if (password_verify($pw, $row['pw'])) {

                //로그인 시간 업데이트
                $sql = "UPDATE member SET login_dt = now() WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function logout()
    {
        session_start();
        session_destroy();
        die("<script>self.location.href = '../index.php';</script>");

    }

    public function getInfo($id)
    {
        $sql = "SELECT * FROM member WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getInfoForm($idx)
    {
        $sql = "SELECT * FROM member WHERE idx = :idx";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function edit($marray)
    {
        $sql = "UPDATE member SET name = :name, phone = :phone, user_icon = :user_icon, pw = :pw";
        $params = [
            ':name' => $marray['name'],
            ':phone' => $marray['phone'],
            ':user_icon' => $marray['user_icon'],
            ':pw' => $marray['pw'],
        ];
        if ($marray['pw'] != '') {
            $new_pw = password_hash($marray['pw'], PASSWORD_DEFAULT);
            $params[':pw'] = $new_pw;
        }
        if($_SESSION == 10 && isset($marray['idx'])&& $marray['idx'] != '' ){
            $params[':idx'] = $marray['idx'];
            $params[':level'] = $marray['level'];
            $sql .= " level = :level";
            $sql .= " WHERE idx = :idx";
        }else{
            $params[':id'] = $marray['id'];
            $sql .= " WHERE id = :id";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }


    //desc 내림차순
    public function list()
    {
        $sql = "SELECT idx, id, name, phone, create_at, login_dt, level FROM member ORDER BY level DESC";
        $stmt = $this->conn->prepare($sql);
        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function member_del($idx){
        $sql = "DELETE FROM member WHERE idx = :idx";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(':idx',$idx);
        $stmt->execute();
    }

    //프로필 이미지
    public function profile_upload($id,$new_user_icon,$old_user_icon = ''){

        if($old_user_icon != ''){
            unlink(PROFILE_DIR . $old_user_icon); //삭제
        }
        
        $tmparr = explode('.', $_FILES['user_icon']['name']);
        $ext = end($tmparr); //확장자 추출
        $user_icon = $id . '.' . $ext; // 파일명 생성
        copy($new_user_icon['tmp_name'], PROFILE_DIR.'/' . $user_icon); // 파일 복사
        return $user_icon;


    }


}

?>