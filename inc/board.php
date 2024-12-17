<?php

class Board{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function list()
    {
        $sql = "SELECT idx, name, create_at, cnt FROM board_mng ORDER BY idx ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create(){
        $sql = "INSERT INTO board_mng (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    
}

?>