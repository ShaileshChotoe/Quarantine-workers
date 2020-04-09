<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../..");
}

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
                <form method="post" action="../../../server/insert.php">
        <div class="public">
            <h1 class="tekst">plak hier je code</h1>
            <textarea name="code" class="inputveld" cols="80"></textarea>
            <input type="submit" name="submit" value="color" class="kleur"> 
        </div>
        <div class="create">
            <div class="section2">
            <input class="checkbox" type="checkbox" name="private" id="private">
            <label class="check" for="private">private</label><br>

            <select class="languages" name="language" id="">
                <option value="php">php</option>
                <option value="html/css">html/css</option>
                <option value="sql">sql</option>
            </select>
            </div>
        </div>
        
        </form>
    </div>
</body>
</html>