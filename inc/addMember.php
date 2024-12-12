<?php
include('../inc/dbconfig.php');

class addMember{
    private $conn;
  
    public function __construct($db){
      $this->conn = $db;
    }
  
    // 아이디 중복체크
    public function id_check($id){
      $sql = "SELECT * FROM add_member WHERE id =:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
  
      return $stmt->rowCount() ? true : false;
    }
  
    public function number_check($number){
        $sql = "SELECT * FROM add_member WHERE number =:number";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':number', $number);
        $stmt->execute();
    
        return $stmt->rowCount() ? true : false;
    }

    public function add_member($id, $pw, $name, $number){
        $sql = "INSERT INTO add_member (id, pw, name, number) VALUES (:id, :pw, :name, :number)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pw', $pw);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':number', $number);
        $stmt->execute();
      }

      // 로그인
      public function login($id, $pw){
        $sql = "SELECT * FROM add_member WHERE id = :id AND pw = :pw";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pw', $pw);
        $stmt->execute();
        return $stmt->rowCount() ? true : false;
      }
 


  }
  
  if($_POST['mode'] == 'id_check'){
    $member = new addMember($db);
    $id = $_POST['id'];
  if($member->id_check($id)){
    $arr = ['result' => 'fail'];
    $json= json_encode($arr);
    echo $json;
  
  }else{
      $arr = ['result' => 'success'];
      $json= json_encode($arr);
      die($json);
    }
  } else if($_POST['mode'] == 'number_check'){
    $member = new addMember($db);
    $number = $_POST['number'];
    if($member->number_check($number)){
        $arr = ['result' => 'fail'];
        $json= json_encode($arr);
        echo $json;
    }else{
        $arr = ['result' => 'success'];
        $json= json_encode($arr);
        die($json);
    }
  }


  $id = $_POST['id'] ?? '';
  $pw = $_POST['pw'] ?? '';
  $name = $_POST['name'] ?? '';
  $phone = $_POST['phone'] ?? '';
  

  $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);
  
  try {
      // SQL 준비
      $stmt = $db->prepare("INSERT INTO add_member (id, pw, name, number) VALUES (:id, :pw, :name, :number)");
  
      // 파라미터 바인딩
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':pw', $pw);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':number', $phone);
  
      // 쿼리 실행
      if ($stmt->execute()) {
          echo json_encode(['result' => 'success', 'message' => '회원가입이 완료되었습니다.']);
      } else {
          echo json_encode(['result' => 'fail', 'message' => '회원가입에 실패했습니다.']);
      }
  } catch (PDOException $e) {
      echo json_encode(['result' => 'fail', 'message' => 'SQL 에러: ' . $e->getMessage()]);
  }
 

  
?>