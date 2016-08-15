<?php
require("db.php");

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
<?php
 
  $_POST = array_map("trim", $_POST);
  $_POST = array_map("strip_tags", $_POST);
  
 /*
// Verifica daca Numele are cel putin 3 caractere si maxim 40
  if(strlen($_POST['nume'])>2 && strlen($_POST['nume'])<41) $nume = $_POST['nume'];
  else $eroare[] = 'Caseta cu Nume si Prenume trebuie sa contina intre 3 si 40 caractere';
  
  // Verifica daca a fost selectata o valoare pt. 'user'
  if(strlen($_POST['username'])>4 && strlen($_POST['username'])<41) $username = $_POST['username'];
  else $eroare[] = 'Selectati "user-ul"';
  
  // Verifica daca a fost selectata o valoare pt. 'parola'
  if(strlen($_POST['parola'])>4 && strlen($_POST['parola'])<41) $parola = $_POST['parola'];
  else $eroare[] = 'Selectati "parola"';
  
  // Verifica daca a fost selectata o valoare pt. 'again'
  if(strlen($_POST['passR'])>4 && strlen($_POST['passR'])<41) $passR = $_POST['passR'];
  else $eroare[] = 'Selectati "parola din nou "';


  // Verifica daca adresa de e-mail scrisa corespunde formatului unei adrese de e-mail
  if(preg_match('/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/', $_POST['email'])) $email = $_POST['email'];
  else $eroare[] = 'Completati corect adresa de e-mail';
  
  // Verifica daca a fost selectata o valoare pt. 'adresa'
  if(strlen($_POST['adresa'])>5) $adresa= $_POST['adresa'];
  else $eroare[] = 'Selectati "adresa"';
  
  // Verifica daca a fost selectata o valoare pt. 'nr tel'
  if(strlen($_POST['telefon'])>10) $telefon= $_POST['telefon'];
  else $eroare[] = 'Selectati "nr_tel"';
	
*/
?>

 
<section>
  <div class="frm">
   <form action="register_get.php" method="post">
       Nume:   <input type="text" name="nume" value="<?php if(isset($nume)) echo $nume; ?>" placeholder="Enter your name"><br>
       User: <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"placeholder="Enter your user"><br>
	   Parola: <input type="password" name="parola" value="<?php if(isset($parola)) echo $parola; ?>"  placeholder="Enter your password"><br>
	  Reintrodu parola: <input type="password" name="passR" value="<?php if(isset($passR)) echo $passR; ?>" placeholder="Renter your password"><br>
	  E-mail: <input type="email" name="email"  value="<?php if(isset($email)) echo $email; ?>" placeholder="Enter your e-mail"><br>
	  Adresa: <input type="address" name="adresa" value="<?php if(isset($adresa)) echo $adresa; ?>" placeholder="Enter your address"><br>
	  Telefon: <input type="text" name="telefon" value="<?php if(isset($telefon)) echo $telefon; ?>"placeholder="Enter your phone number"> <br>
	    <input type="submit" value="Register" name="submit"><br>
	   </form>
	</div>
</section>

</body>
</html>