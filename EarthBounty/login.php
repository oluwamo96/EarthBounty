<?php
session_start();
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get username and password from form submission
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);
  
  // Check if username and password match database records
  $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($db,$sql);
  $count = mysqli_num_rows($result);
  
  // If username and password match, log user in and redirect to profile page
  if($count == 1) {
    $_SESSION['username'] = $username;
    header("location: profile.php");
  } else {
    $error = "Your Username or Password is invalid.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bounty Hunter Website - Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Bounty Hunter Website</h1>
    </div>
  </header>
  <section id="login-form">
    <div class="container">
      <h2>Login</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <?php if(isset($error)) { ?>
          <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <div class="form-group">
          <button type="submit">Login</button>
        </div>
      </form>
      <div class="signup">
        Don't have an account? <a href="signup.php">Sign up here</a>.
      </div>
    </div>
  </section>
</body>
</html>
