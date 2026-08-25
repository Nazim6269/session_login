<?php

session_start();
require_once 'includes/auth_functions.php';

requireLogin();

?>

<!DOCTYPE html>
<html>

<head>
  <title> Dashboard </title>
</head>

<body>
  <h1> Dashboard </h1>
  <p>Welcom <?= htmlspecialchars($_SESSION['username']) ?>! </p>
  <a href="logout.php"> logout </a>
</body>

</html>
