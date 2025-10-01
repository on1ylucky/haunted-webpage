<?php
// login-process.php
session_start();

// === CONFIG: location of server-only credential store ===
// Put this file outside the web root if possible.
// Example: if webroot is /var/www/html, place creds at /var/www/.ctf_credentials.json
$creds_path = dirname(__DIR__) . '/.ctf_credentials.json'; // one level up from webroot
// If you must keep it in project, use: __DIR__ . '/.ctf_credentials.json' and ensure .gitignore blocks it.

if (!file_exists($creds_path)) {
    http_response_code(500);
    echo "<h1>Server config error</h1><p>Credential store not found.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    echo "<h1>Method Not Allowed</h1>";
    exit();
}

// Read JSON credential store (username_hash & password_hash)
$creds_json = file_get_contents($creds_path);
$creds = json_decode($creds_json, true);

if (!is_array($creds) || empty($creds['username_hash']) || empty($creds['password_hash'])) {
    http_response_code(500);
    echo "<h1>Server config error</h1><p>Credential store malformed.</p>";
    exit();
}

// Basic sanitization (trim)
$raw_username = isset($_POST['username']) ? trim($_POST['username']) : '';
$raw_password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($raw_username === '' || $raw_password === '') {
    http_response_code(400);
    echo "<h1>Bad Request</h1><p>Provide both username and password.</p>";
    exit();
}

// Verify using password_verify against stored hashes
$username_ok = password_verify($raw_username, $creds['username_hash']);
$password_ok = password_verify($raw_password, $creds['password_hash']);

if ($username_ok && $password_ok) {
    // Login success
    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;
    $_SESSION['username_display'] = htmlspecialchars($raw_username, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    header('Location: flag.php');
    exit();
}

// Failed login
http_response_code(401);
echo "<!DOCTYPE html><html lang='en'><head><meta charset='utf-8'><title>Access Denied</title></head><body style='background:black;color:white;text-align:center;padding-top:80px;font-family:monospace;'>";
echo "<h1>Access Denied</h1>";
echo "<p>The spirits do not recognize you...</p>";
echo "<p><a href='login.html' style='color:#ff6347;text-decoration:none;'>Return to login</a></p>";
echo "</body></html>";
exit();
?>
