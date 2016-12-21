<html>
<head>
	<title>Grassroots</title>
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
				<li><a href="register.php">Register</a></li>
                <li><a href="login.php">Staff Intranet</a></li>
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
					<li><a href="custLogin.php">Login</a></li>
					<?php
				}

				?>

    </ul>
	</nav>

<?php

if(isset($_SESSION['isLoggedIn'])){
	if($_SESSION['isLoggedIn'] == "yes"){
		echo "ID = ";
		echo $_SESSION['login_user'];
		echo "<br>";
		echo "Hello, " $_SESSION['firstname'] . " ";
		echo $_SESSION['surname'];
		echo "<br>";
		echo "Privileges = ";
		echo $_SESSION['privileges'];
	}
}
?>		
<img src="http://i.imgur.com/Mwt2hT3.jpg?1" alt="image" class="image_description">
	<div class="grid">
					<img src = "image.jpg" alt="image" class="grid-item">
					<img src = "http://www.livescience.com/images/i/000/066/622/original/brazuca-soccer-ball-140529.jpg?interpolation=lanczos-none&fit=around%7C300:200&crop=300:200;*,*" alt="image" class="grid-item">
                    <img src = "http://www.livescience.com/images/i/000/066/622/original/brazuca-soccer-ball-140529.jpg?interpolation=lanczos-none&fit=around%7C300:200&crop=300:200;*,*" alt="image" class="grid-item">
                    <img src = "image.jpg" alt="image" class="grid-item">
					<img src = "boots.jpg" alt="image" class="grid-item">
                    </div>
                <script src ="FrontPage.js">
                    </script>
					
                <script>
                    window.onload = () => {
                        let gridElement = document.querySelector(".grid");
                        window.ms = new Masonry(gridElement, {
                            "itemSelector": '.grid-item',
                            "percentPosition": true
                        })
                        ms.masonry();
                    };
                    </script>
					<!--<h2 id="description">Grassroots is your home of soccer equipment - boots, balls, shirts and everything else you might ever need!</h2>
	<h2 id="description">We supply local football teams all over the country. You can order by mail, over the phone, or by visiting one of our stores today.</h2>-->
	
	</body>
	</html>