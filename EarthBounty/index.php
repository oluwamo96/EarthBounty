<?php
session_start();

// Check if user is logged in
if(isset($_SESSION["username"])) {
  $welcome_message = "Welcome, ".$_SESSION["username"]."!";
  $profile_link = '<li><a href="profile.php">Profile</a></li>';
  $logout_button = '<li><a href="logout.php">Logout</a></li>';
} else {
  $welcome_message = "Welcome!";
  $profile_link = '';
  $logout_button = '';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bounty Hunter Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Bounty Hunter Website</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php echo $profile_link; ?>
          <?php echo $logout_button; ?>
        </ul>
      </nav>
    </div>
  </header>
  <section id="banner">
    <div class="container">
      <h1><?php echo $welcome_message; ?></h1>
      <p>Stay up-to-date with the latest bounties and information.</p>
    </div>
  </section>
  <section id="latest-info">
    <div class="container">
      <h2>Latest Information</h2>
      <ul>
        <li>
          <h3>Subject of Information</h3>
          <p>Description of Information</p>
          <p class="info-details">Posted by: Informant123 | Level: 3 | Credibility: 80% | Posted on: 27 Feb 2023</p>
        </li>
        <li>
          <h3>Subject of Information</h3>
          <p>Description of Information</p>
          <p class="info-details">Posted by: Informant456 | Level: 2 | Credibility: 60% | Posted on: 26 Feb 2023</p>
        </li>
        <li>
          <h3>Subject of Information</h3>
          <p>Description of Information</p>
          <p class="info-details">Posted by: Informant789 | Level: 1 | Credibility: 40% | Posted on: 25 Feb 2023</p>
        </li>
      </ul>
    </div>
  </section>
</body>
</html>
