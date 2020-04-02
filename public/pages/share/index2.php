<?php

include '../../../server/classes/DB.class.php';

$db = new DB('localhost', 'quarantine', 'root', '');

$id = $_GET['id'];

$postData = $db->connect()->getPost($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totalcode</title>
    <link rel="stylesheet" href="styles/vs2015.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <div class="index">
        <button onclick="logout()" class="logout">Log uit</button>
        <form method="post" action="../../../server/insert.php">
        <div class="public">
            <pre><code>
            <?php echo $postData->code; ?>
            </code></pre>            
        </div>
        <div class="create">

        </div>
        <div class="private">

        </div>
        </form>
    </div>
</body>
</html>