<?php

class Board
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
 
    public function board_input($marray)
    {
        $sql = "INSERT INTO board_mng(id,writer,title,content,creat_at,idx) VALUES (:id,:writer,:title,:content,now(),0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $marray['id']);
        $stmt->bindParam(':writer', $marray['writer']);
        $stmt->bindParam(':title', $marray['title']);
        $stmt->bindParam(':content', $marray['content']);
        $stmt->execute();
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
        $sql = "SELECT * FROM board_mng ORDER BY idx DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBoardInfo($idx)
    {
        $sql = "SELECT * FROM board_mng WHERE idx = :idx";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function board_del($idx){
        $sql = "DELETE FROM board_mng WHERE idx = :idx";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(':idx',$idx);
        $stmt->execute();
    }




}

?>