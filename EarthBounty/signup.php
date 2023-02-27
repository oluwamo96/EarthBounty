<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bounty Hunters - Sign Up</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Sign Up</h2>
		<form method="post" action="signup.php">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<label for="profession">Profession</label>
			<select id="profession" name="profession" required>
				<option value="">-- Select Profession --</option>
				<option value="bounty hunter">Bounty Hunter</option>
				<option value="informant">Informant</option>
			</select>
			<button type="submit" name="submit">Sign Up</button>
		</form>
		<p>Already have an account? <a href="login.php">Log in</a></p>
	</div>
</body>
</html>
