<html>
<head>
<title>Login</title>
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
<form name="Customer login" action="custLoginForm.php" method="post">
<input type="text" name="email" placeholder="Email address" pattern=".{1,20}" required title="Enter Email">
<input type="password" name="password" placeholder="Password" pattern=".{4,15}" required title="4 to 15 characters">
</br>
<input type="submit" value="Sign In" class="LoginBtn">
</form>
</article>
</div>
<div class="grid">
					<img src = "http://hildasjcr.org.uk/wp-content/uploads/2015/07/Football.png" alt="image" class="grid-item">
					<img src = "http://www.thesoccerstore.co.uk/media/catalog/product/cache/1/small_image/203x203/9df78eab33525d08d6e5fb8d27136e95/s/t/striped_nets_flat.jpg" alt="image" class="grid-item">
                    <img src = "http://www.prodirectsoccer.com/productimages/thumbs/110384.jpg" alt="image" class="grid-item">
                    <img src = "image2.jpg" alt="image" class="grid-item">
					<img src = "boots.jpg" alt="image" class="grid-item">
					<img src = "http://cdn1.uksoccershop.com/images/barcelona-2014-2015-nike-away-football-shorts.jpg" alt="image" class="grid-item">
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
                    </script>-->
</body>
</html>