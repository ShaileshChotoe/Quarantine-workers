<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../..");
}

include '../../../server/classes/DB.class.php';

$db   = 'quarantine';
$host= 'localhost';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

$sql = "SELECT * FROM posts where private = false";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$links = $stmt->fetchAll(PDO::FETCH_OBJ);

$db = new DB('localhost', 'quarantine', 'root', '');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totalcode</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="index">
    <form action="../../../server/logout.php" method="post">
    <button class="logout">Log uit</button>
    </form>
        <div class="public">
            <h1 class="tekst">Hier alle openbare dingen</h1>
            <?php
            
            foreach ($links as $key => $value) {
                $user = $db->connect()->getUserName($value->userId);
                echo "<a href='$value->link' class='publiccode'>$user->username view code</a>";
            }
            
            ?>
        </div>
        <div class="create">
            <a href="../input/"><button class="createbutton">share your code</button></a>
        </div>
        <!-- <div class="private">
            <h1 class="tekst">Enter your private code</h1>
            <input type="text" class="code" placeholder="Your private code">
        </div> -->
    </div>
</body>
</html>