<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["comment"];
    $comment = htmlspecialchars($comment);
    file_put_contents('comments.txt', $comment . "\n", FILE_APPEND);
}
header('Location: index.php');
?>