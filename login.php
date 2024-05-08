<?php
session_start();

// Include database connection script (replace with your details)
require_once('db_connect.php');

// Check if login button is pressed
$con=new mysqli("localhost","root","","php data");
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Hash password for comparison (replace with your hashing function)
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare SQL statement (prevents SQL injection)
  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind values to prepared statement
  mysqli_stmt_bind_param($stmt, "s", $username);

  // Execute statement
  mysqli_stmt_execute($stmt);

  // Get result
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Verify password hash
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      header("location: dashboard.php"); // Redirect to dashboard
    } else {
      $error = "Invalid username or password";
    }
  } else {
    $error = "Invalid username or password";
  }

  // Close statement and connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

?>
