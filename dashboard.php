<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
  <title> Dashboard </title>
</head>

<body>
  <h1> Dashboard </h1>
</body>

</html>
