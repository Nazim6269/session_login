<?php

session_start();
require_once 'includes/auth_functions.php';

$filePath = 'data/users.json';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  $users = getUsers($filePath);
  $user = verifyLogin($users, $username, $password);

  if ($user !== null) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Invalid Username or Password';
  }
}

?>

<!DOCTYPE html>

<html>

<head>

  <title> Login </title>


</head>

<body>

  <h1> Login </h1>
  <form method="post" action="login.php">
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>
    <button type="submit">Login</button>

  </form>
</body>

</html>
