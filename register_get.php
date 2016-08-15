<?php

require("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $nume = $_POST['nume'];
  $username = $_POST['username'];
  $parola = $_POST['parola'];
  $passR = $_POST['passR'];
  $email = $_POST['email'];
  $adresa = $_POST['adresa'];
  $telefon = $_POST['telefon'];

  $date = date("Y-m-d H:i:s");

  $password = md5($parola);

  mysql_query("INSERT INTO users VALUES ('', '".$nume."', '".$username."', '".$password."', '".$email."', '".$adresa."', '".$telefon."', '', '".$date."')");
  

  if(mysql_error()){
    echo mysql_error();
    echo "Eroare la inregistrare!";
  }else{
    session_start();
    $_SESSION['username'] = $username;
  }

}

?>

<!doctype html>
<html>
<head>

 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\bottle1.ico" />
  <title >Promotii</title>
<style>
nav{
    width:140px;
    height:550px;
}

.subMenu{
    text-align:right;
}

a:link{
    font-weight: bold;
    color: blue;
    font-family: Buxton Sketch, Helvetica, sans-serif;
    width: 120px;
    padding: 4px;
    text-decoration: none;
}
a:visited{
   color:blue;
}

section{

    height:540px;
}
div.frm {
	   height:400px;
	   margin:60px;
	   margin-left:250px;
}
</style>
</head>
 
<body>

<a rel href="TW.html"><img src="JuicyJuiceLogo.png" alt="logo" height="150" width="200"></a>
<p></p>

<nav>

                <ul>
                    <li><a rel href="sign_in.html"><img src="sign_in.png" alt="Sign-in" height="100" width="100"></a></li>
                    <li><a href="http://localhost/twJuicy/prod.php"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
                    <ul class="subMenu">
                        <li><a href="categorii.html"><img src="frame1.png" alt="Categorii" height="30" width="30">Categorii</a></li>
			<li><a href="promotii.html"><img src="frame1.png" alt="Promotii" height="30" width="30">Promotii</a></li>
			<li><a href="favorite.html"><img src="frame1.png" alt="Favorite" height="30" width="30">Favorite</a></li>
                    </ul>
                    <li><a href="cos.html"><img src="shopping_Cart.png" alt="Cosul meu" height="100" width="100"></a></li>
                    <li><a href="faq.html"><img src="question_mark.png" alt="FAQ" height="100" width="100"></a></li>
                </ul>
</nav>


<section>

<h1> Inregistrare efectuata cu succes !!!! </h1>

</section>

</body>
</html>