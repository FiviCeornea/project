<?php

require("db.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST["user"];
	$password = $_POST["pass"];
	$password = md5($password);
	$result = mysql_query("SELECT * FROM users WHERE username='".$username."' AND parola='".$password."'");
	//echo "SELECT * FROM users WHERE username='".$username."' AND parola='".$password."'";
	echo mysql_error();
	mysql_num_rows($result);
	if(mysql_num_rows($result))
	{
		session_start();
		$_SESSION['username'] = $username;

	}
	else
	{
		//header("Location: <link>");
	}

}
?>

<!doctype html>
<head>

 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\bottle1.ico" />
  <title >TwJuicy</title>

</head>
 
<body>
<a rel href="index.php"><img src="logo/logo.png" alt="logo" height="200" width="200" class="logo" ></a>
<p></p>


<nav>

                <ul>
                    <li><a rel href="http://localhost/twJuicy/contulmeu.php"><img src="in.png" alt="in" height="100" width="100"></a></li>
                    <li><a href="http://localhost/twJuicy/prod.php"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
                    <li><a href="cos.html"><img src="shopping_Cart.png" alt="Cosul meu" height="100" width="100"></a></li>
                    <li><a href="faq.html"><img src="question_mark.png" alt="FAQ" height="100" width="100"></a></li>
                </ul>
</nav>

<section>
<aside>
<img src="JuicyJuiceLogo.png" alt="logo" height="150" width="200">
</aside>

</section>

    
</body>
</html>