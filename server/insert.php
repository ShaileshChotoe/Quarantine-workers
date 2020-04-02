<?php

session_start();

include 'classes/DB.class.php';

$code = htmlspecialchars($_POST['code']);
if (!isset($_POST['private']))
{
    $private = false;
}
else {
    $private = true;
}
$language = $_POST['language'];
$link = 'www.randomlink.nl';
$userId = $_SESSION['id'];


$db = new DB('localhost', 'quarantine', 'root', '');

$db->connect()->insertPost($code, $userId, $language, $private, $link);

//gedeelte moet weg
$lastId = $db->connect()->getLastIdPost();


$id =  $lastId[0];
header("Location: ../public/pages/share/index2.php?id=$id");

echo "<pre>" . $code . "</pre>";

?>