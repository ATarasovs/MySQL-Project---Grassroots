<html>
<head>
	<title>Staff Login</title>
	<link rel="stylesheet" type="text/css" href="CUStyle.css">
</head>
<body>
	<header> 
	<table width="100%">
	<tr>
		<td>
			<h1 class="grassroots">Grassroots</h1>
		</td>
		<td>
			<h2 class="title">Your home of soccer equipment</h2>
		</td>
	</tr>
	</table>
	</header>
		<nav>
	<ul>
                <li class="footer"><a href="index.php">Home</a></li>
                <li><a href="custProducts.php">Products</a></li>
                <li><a href="custBranch.php">Contact Us</a></li>
				
				<?php
				include "db.php";
				include "custLoginForm.php"; 
				if(isset($_SESSION['isLoggedIn'])){
					if (($_SESSION['isLoggedIn'] == "yes"))
					{
						?>
						<li><a href="custProfile.php">Profile</a></li>
						<li><a href="logout.php">Log out</a></li>
						<?php
					}
				}
				else
				{
					?>
					<li><a href="register.php">Register</a></li>
					<li><a href="custLogin.php">Login</a></li>
					<?php
				}

				?>
				<li id="intranet"><a href="login.php">Staff Intranet</a></li>

    </ul>
	</nav>
<div id="LoginForm">
<article>
<form name="Staff login" action="loginform.php" method="post">
<input type="text" name="ID" placeholder="Staff ID" pattern=".{1,20}" required title="Enter ID">
<input type="password" name="password" placeholder="Password" pattern=".{4,15}" required title="4 to 15 characters">
</br>
<input type="submit" value="Sign In" class="LoginBtn">
</form>
</article>
</div>
</body>
</html>