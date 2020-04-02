<?php



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
        <button onclick="logout()" class="logout">Log uit</button>
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
                <option value="php">PHP</option>
                <option value="html/css">HTML/CSS</option>
                <option value="sql">SQL</option>
            </select>
            </div>
        </div>
        <div class="private">
            <h1 class="tekst">Enter your private code</h1>
            <input type="text" class="code" placeholder="Your private code">
        </div>
        </form>
    </div>
</body>
</html>