<?php
session_start();

// Check if user is logged in
if(isset($_SESSION["username"])) {
  $welcome_message = "Welcome, ".$_SESSION["username"]."!";
} else {
  header("Location: login.php");
  exit();
}

// Connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Display information posted by informant
if($_SESSION["user_type"] == "informant") {
  $sql = "SELECT * FROM information WHERE informant_username = '".$_SESSION["username"]."'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    echo "<p>Information Posted: </p>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div>";
      echo "<h3>".$row["subject"]."</h3>";
      echo "<p>".$row["content"]."</p>";
      echo "<p>Date Posted: ".$row["post_date"]."</p>";
      echo "</div>";
    }
  } else {
    echo "<p>No information posted yet.</p>";
  }
}

// Display bounties completed by bounty hunter
if($_SESSION["user_type"] == "bounty hunter") {
  $sql = "SELECT * FROM bounty WHERE bounty_hunter_username = '".$_SESSION["username"]."' AND status = 'completed'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    echo "<p>Bounties Completed: </p>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div>";
      echo "<h3>".$row["bounty_name"]."</h3>";
      echo "<p>Reward: ".$row["reward"]."</p>";
      echo "<p>Date Completed: ".$row["completion_date"]."</p>";
      echo "</div>";
    }
  } else {
    echo "<p>No bounties completed yet.</p>";
  }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile - Bounty Hunter Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Bounty Hunter Website</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="banner">
    <div class="container">
      <h1><?php echo $welcome_message; ?></h1>
    </div>
  </section>
  <section id="user-info">
    <div class="container">
      <h2>Profile Information</h2>
      <p>Name: <?php echo $_SESSION["name"]; ?></p>
      <p>Username: <?php echo $_SESSION["username"]; ?></p>
      <p>Email: <?php echo $_SESSION["email"]; ?></p>
      <p>Level: <?php echo $_SESSION["level"]; ?></p>
      <p>C
