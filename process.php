<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = $_POST['action'];

  if ($action == 'register') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $phone, $password);

    if ($stmt->execute()) {
      $_SESSION['user_id'] = $conn->insert_id;
      $_SESSION['username'] = $username;
      header("Location: home.php");
    } else {
      $_SESSION['error'] = "Registration failed!";
      header("Location: index.php");
    }

  } elseif ($action == 'login') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: home.php");
      } else {
        $_SESSION['error'] = "Incorrect password.";
        header("Location: index.php");
      }
    } else {
      $_SESSION['error'] = "No user found.";
      header("Location: index.php");
    }
  }
}
?>