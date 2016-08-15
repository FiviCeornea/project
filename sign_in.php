<!doctype html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\bottle1.ico" />
  <title >Sign-In</title>

</head>
<body>

<a rel href="index.php"><img src="logo/logo.png" alt="logo" height="200" width="200" class="logo" ></a>
<p></p>

<nav>

                <ul>
                    <li><a rel href="sign_in.php"><img src="sign_in.png" alt="Sign-in" height="100" width="100"></a></li>
                    <li><a href="http://localhost/twJuicy/prod.php"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
                    <li><a href="cos.php"><img src="shopping_Cart.png" alt="Cosul meu" height="100" width="100"></a></li>
                    <li><a href="faq.php"><img src="question_mark.png" alt="FAQ" height="100" width="100"></a></li>
                </ul>
</nav>

<section>
<p></p>
<p></p>
 <div class="frm">
   <form action="contulmeu.php" method="post">
       User:   <input type="user" name="user" placeholder="Enter your user"><br>
       Password: <input type="password" name="pass" placeholder="Enter your password"><br>
      <input type="submit" value="Login"> <br>
    </form>
    <form action="register.php" method="get">
       <input type="submit" value="Register">
   </form>
   <a rel href="forgotPass.html"><p>Forgot password?</p></a>
</div>
</section>

</body>
</html>