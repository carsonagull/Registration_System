<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p>This is the home page.</p>
<a href="logout.php">Logout</a>
</body>
</html>