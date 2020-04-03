<?php
$db   = 'quarantini';
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
echo $pdo->query('select version()')->fetchColumn();

echo "<br/> <br/> <br/>" . "code" . "<br/>";

$stmt = $pdo->query('SELECT * FROM quarantini.codes;');
while ($row = $stmt->fetch()) {
    echo "<br/>" . $row['codescol'] . " code " . $row['codescol'] . "<a href='series.php?id=" . $row['id'] . "'>Meer informatie</a>";
}