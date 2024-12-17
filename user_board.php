<?php
include "header.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testphp";
$conn = new mysqli($servername, $username, $password, $dbname);

try{
$db= new PDO("mysql:host={$servername}; dbname={$dbname}", $username, $password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 오류 출력
$sql = "SELECT * FROM member WHERE 1";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($result);

} catch(PDOException $e){
    echo $e->getMessage();
}
?>
<main id="main" class="container">
    <h1>유저 목록</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>아이디</th>
                <th>이름</th>
                <th>전화번호</th>
            </tr>
        </thead>
        <?php foreach($result as $row): ?>
        <tbody>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
