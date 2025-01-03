<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-image: url('img/bank1.jfif'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Query to check if the email exists in the user table
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Set session and redirect
        $_SESSION['user'] = $row['name'];
        echo "<script>alert('Login successful!');</script>";
        header('Location: index.php'); // Replace with your target page after login
    } else {
        echo "<script>alert('Invalid email!');</script>";
    }
}
?>

<div class="container">
  <div class="alert">
    <h1>ALERT:</h1>
    <p>There are scam calls targeting customers to make bank transfers. DO NOT disclose any account details, User ID, PINs, or SMS OTP to anyone. Due to COVID-19, we have limited our Secured Mailbox services. For queries, visit Help and Support or chat with us.</p>
  </div>
  <div class="login-form">
    <h4>Welcome to our bank</h4>
    <h1>Login Details</h1>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Email" required>
      <button type="submit">Login</button>
    </form>
  </div>
</div>

</body>
</html>
