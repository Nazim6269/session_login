<?php


function getUsers(string $filePath): array
{

  if (!file_exists($filePath)) {
    return [];
  }

  $jsonContent = file_get_contents($filePath);

  if ($jsonContent == false || $jsonContent == '') {
    return [];
  }

  $users = json_decode($jsonContent, true);


  if (!is_array($users)) {
    return [];
  }

  return $users;
}


function findUserByUserName(array $users, string $username): ?array
{

  foreach ($users as $user) {
    if (
      $user['username'] === $username
    ) {
      return $user;
    }
  }

  return null;
}

function verifyLogin(array $users, string $username, string $password): ?array
{
  $user = findUserByUserName($users, $username);

  if ($user == null) {
    return null;
  }

  if (!password_verify($password, $user['password'])) {
    return null;
  }


  return $user;
}

function requireLogin(): void
{

  if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
  }
}
