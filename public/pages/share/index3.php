<?php

include '../../../server/classes/DB.class.php';

$db = new DB('localhost', 'quarantine', 'root', '');

$id = $_GET['id'];

$postData = $db->connect()->getPost($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/vs2015.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <pre><code class="php">
      <?php echo $postData->code; ?>
    </code></pre>
</body>

</html>