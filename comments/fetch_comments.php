<?php
    $comments = file('comments.txt');
    foreach($comments as $comment) {
        echo '<p>' . $comment . '</p>';
    }
?>