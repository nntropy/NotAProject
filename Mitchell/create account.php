<?php

$title = "login";
$sidebar = "null";
$content = '
    <div class="login">
        <input type="text" placeholder="Username" id="username">
        <input type="password" placeholder="password" id="password">
        <a href="#" class="create">create an account</a>
        <a href="#" class="forgot">forgot password?</a>
        <input type="submit" value="Sign In">
    </div>';
include 'Template.php';
?>

