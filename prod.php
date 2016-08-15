<!doctype html>
<head>

 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\bottle1.ico" />
  <title >Produse</title>
<style>
nav{
    width:140px;
    height:auto;
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

    height: auto;
}

form.srch{ font-size:80%;}
</style>
</head>
 
<body>

<a rel href="index.php"><img src="logo/logo.png" alt="logo" height="200" width="200" class="logo" ></a>
<p></p>
<nav>

                <ul>
                   <li><a rel href="http://localhost/twJuicy/contulmeu.php"><img src="in.png" alt="in" height="100" width="100"></a></li>
                    <li><a href="http://localhost/twJuicy/prod.php"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
                    <ul class="subMenu">
                        <li><a href="categorii.html"><img src="frame1.png" alt="Categorii" height="30" width="30">Categorii</a></li>
			<li><a href="promotii.html"><img src="frame1.png" alt="Promotii" height="30" width="30">Promotii</a></li>
			<li><a href="favorite.html"><img src="frame1.png" alt="Favorite" height="30" width="30">Favorite</a></li>
			<li><a href="facturi.php"><img src="frame1.png" alt="Facturi" height="30" width="30">Facturi</a></li>
                    </ul>
                    <li><a href="cos.html"><img src="shopping_Cart.png" alt="Cosul meu" height="100" width="100"></a></li>
                    <li><a href="faq.html"><img src="question_mark.png" alt="FAQ" height="100" width="100"></a></li>
                </ul>
</nav>

<section>

    <form class="srch" action="search.php" method="post">
       Search in products:  
          nume:<input type="text" name="nume" placeholder="Enter something">
		  pret: <input type="text" name="pret" placeholder="Enter something">
		  categorie:<input type="text" name="categorie" placeholder="Enter something">
       <input type="submit" value="Search"> <br>
    </form>

   <?php
         $mysql = new mysqli ('127.0.0.1', 'root', '', 'juicydb' );
 
	if (mysqli_connect_errno()) {
		die ('Conexiunea a esuat...');
	}

	if (!($rez = $mysql->query ('select * from produse'))) {
		die ('A survenit o eroare la interogare');
	}

// generam o lista numerotata cu informatii despre studenti
	echo ('<ol>');
// preluam inregistrarile gasite   
	while ($inreg = $rez->fetch_assoc()) {
		echo ('<li>Produsul ' . $inreg['nume'] . ' are pretul ' . $inreg['pret'] . '</li>');
	}



   ?>
        
		<div class="img ">
	
		</form>
		</div>
		

</section>
    
</body>
</html>