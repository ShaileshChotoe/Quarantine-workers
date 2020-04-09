<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../..");
}

include '../../../server/classes/DB.class.php';

$db = new DB('localhost', 'quarantine', 'root', '');

$id = $_GET['id'];

$postData = $db->connect()->getPost($id);

$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$db->connect()->insertLinkintoPost($id, $link);

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
    <form action="../../../server/logout.php" method="post">
    <button class="logout">Log uit</button>
    </form>
    <button onclick="goToPage()" class="logout">Home page</button>
        <form method="post" action="../../../server/insert.php">
        <div class="public">
            <pre id='code'><code class=<?php echo $postData->language?>>
            <?php echo $postData->code; ?>
            </code></pre>
            <input onclick='copycode()' type='button' class='code' value='copy code'>            
        </div>
        <div class="create">

        </div>
        <?php 

    if ($postData->userId == $_SESSION['id']){
        echo "<div class='private'>
        <h1 class='tekst'>Your private link</h1>
        <input onclick='copy(this)' type='text' class='code' value=$link>
    </div>";
    }

        ?>
        </form>
    </div>
    <script>
    
    function copy(el)
    {
        el.select();
        document.execCommand("copy");
        alert('Copied link to clipboard');
    }

    function copycode(el)
    {
        const copyText = document.getElementById("code").textContent;
  const textArea = document.createElement('textarea');
  textArea.textContent = copyText;
  document.body.append(textArea);
  textArea.select();
  document.execCommand("copy");
  alert("copied code to clipboard");
    }

    function goToPage()
    {
        window.location.href = "../../pages/frontpage";
    }
    
    </script>
</body>
</html>