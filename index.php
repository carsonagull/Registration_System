<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login / Register</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      text-align: center;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    form {
      margin-bottom: 20px;
    }

    input[type="text"], input[type="email"], input[type="password"] {
      padding: 8px;
      width: 80%;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f0f8ff; /* Soft pastel blue */
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      background-color: #e6f7ff; /* Slightly lighter on focus */
      border-color: #80bdff;
      outline: none;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
    }

    button[type="submit"]:first-of-type {
      background-color: #28a745; /* Green for register */
    }

    button[type="submit"]:last-of-type {
      background-color: #007bff; /* Blue for login */
    }

    p {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form action="process.php" method="POST">
      <input type="hidden" name="action" value="register">
      Username: <br><input type="text" name="username" required><br>
      Email: <br><input type="email" name="email" required><br>
      Phone: <br><input type="text" name="phone" required><br>
      Password: <br><input type="password" name="password" required><br>
      <button type="submit">Register</button>
    </form>

    <h2>Login</h2>
    <form action="process.php" method="POST">
      <input type="hidden" name="action" value="login">
      Email: <br><input type="email" name="email" required><br>
      Password: <br><input type="password" name="password" required><br>
      <button type="submit">Login</button>
    </form>

    <?php
    if (isset($_SESSION['error'])) {
      echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
      unset($_SESSION['error']);
    }
    ?>
  </div>
</body>
</html>
