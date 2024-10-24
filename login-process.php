<?php

$correct_username = "ghostbuster24";
$correct_password = "h4untedh4cker10";


$username = $_POST['username'];
$password = $_POST['password'];


if ($username === $correct_username && $password === $correct_password) {
   
    header("Location: flag.html");
    exit();
} else {
 
    echo "<h1>Access Denied</h1>";
    echo "<p>The spirits do not recognize you...</p>";
}
?>
