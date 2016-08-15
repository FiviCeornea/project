<?php

	if(isset($_GET['action']) && $_GET['action']=="add"){
		
		$id=intval($_GET['id']);
		
		if(isset($_SESSION['cart'][$id])){
			
			$_SESSION['cart'][$id]['quantity']++;
			
		}else{
			
			$conn=oci_connect("system","rucurucu","localhost:1522/orcl");
	        If (!$conn)
		             echo 'Failed to connect to Oracle';
	
      	$s = ociparse($conn, "SELECT * FROM PRODUSE_PROJ WHERE id_produs={$id}");
		
			if(ocirowcount($query_s)!=0){
				$row_s=ocifetch($s);
				
				$_SESSION['cart'][$row_s['id_product']]=array(
						"quantity" => 1,
						"price" => $row_s['price']
					);
				
				
			}else{
				
				$message="This product id it's invalid!";
				
			}
			
		}
		
	}
?>
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

    height:auto;
}
</style>
</head>
 
<body>

<a rel href="TW.html"><img src="JuicyJuiceLogo.png" alt="logo" height="150" width="200"></a>
<p></p>
<nav>

                <ul>
                    <li><a rel href="sign_in.html"><img src="sign_in.png" alt="Sign-in" height="100" width="100"></a></li>
                    <li><a href="produse.html"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
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
	<?php
		if(isset($message)){
			echo "<h2>$message</h2>";
		}
		
	$conn=oci_connect("system","rucurucu","localhost:1522/orcl");
	If (!$conn)
		echo 'Failed to connect to Oracle';
	
	$s = ociparse($conn, "SELECT * FROM PRODUSE_PROJ");
    echo '<br />';
    if(ociexecute($s))
    {
        while (ocifetch($s)) 
        {
		
			
			 echo '<div class="img">';
			 echo '<a target="_blank" href=" ">';
			 echo ' <img src="'.ociresult($s,"IMAGINE").'" alt="Cherry" width="110" height="90">';
			 echo '</a>';
			 echo '<div class="desc"> '.ociresult($s, "NUME").'</div>';
			 echo ' <div class="pret"> pret: '.ociresult($s,"PRET"). '</div>';
			 echo '<div><input type="text" name="quantity" value="1" size="2" /> <input type="submit" value="Adauga in cos"  onClick=" index.php"  /></div>';
			 echo '<a href="cos.html">Add to cart</a>';
			 echo '<h5> Stoc:' .ociresult($s,"STOC"). '</h4>'; 
			 echo '</div>';
            
        }
    }
    else
    {
	$e = oci_error($s); 
        echo htmlentities($e['message']);
    }
?>
    
</body>
</html>