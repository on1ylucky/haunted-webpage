<?php
// Hardcoded credentials
$correct_username = "ghostbuster24";
$correct_password = "h4untedh4cker10";

// Get the submitted form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the credentials are correct
if ($username === $correct_username && $password === $correct_password) {
    // Redirect to flag page if credentials are correct
    header("Location: flag.html");
    exit();
} else {
    // If incorrect, show an error message
    echo "<h1>Access Denied</h1>";
    echo "<p>The spirits do not recognize you...</p>";
}
?>
