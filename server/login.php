<?php

include 'classes/DB.class.php';

$username = $_POST['username'];
$password = $_POST['password'];

$db = new DB('localhost', 'quarantine', 'root', '');

$user = $db->connect()->getUser($username, $password);

checkIfUserExist($user);

function checkIfUserExist($user)
{
    if ($user != false) {
        header("Location: ../public/pages/frontpage/index.php");
    } else {
        header("Location: ../public/index.php");
    }
}

?>