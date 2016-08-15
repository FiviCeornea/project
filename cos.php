<!doctype html>
<head>

 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\carticon.ico" />
  <title >Cos</title>
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
</style>
</head>
 
<body>

<a rel href="TW.html"><img src="JuicyJuiceLogo.png" alt="logo" height="150" width="200"></a>
<p></p>

<nav>

                <ul>
                    <li><a rel href="sign_in.html"><img src="sign_in.png" alt="Sign-in" height="100" width="100"></a></li>
                    <li><a href="http://localhost/twJuicy/prodTest.php"><img src="bottle.png" alt="Produse" height="100" width="100"></a></li>
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
<?php
$quantity=$_POST['quantity'];
$id=$_POST['id'];

$conn=oci_connect("system","rucurucu","localhost:1522/orcl");
	         If (!$conn)
		        echo 'Failed to connect to Oracle';
	
	    $s = ociparse($conn, "SELECT * FROM PRODUSE_PROJ  WHERE ID_PRODUS=$id");
	
             echo '<br />';
			 
 if(ociexecute($s))
         {
           while (ocifetch($s)) 
           {   
	         if(ociresult($s,"STOC")>$quantity){
				 
				 $ss =ociparse($conn,"LOCK TABLE PRODUSE_PROJ IN EXCLUSIVE MODE");
				 oci_execute($ss);
				 		
			$strSQL = "UPDATE PRODUSE_PROJ SET ";  
            $strSQL .="STOC=STOC - '".$quantity."' ";  
            $strSQL .="WHERE ID_PRODUS = '".$id."' ";  
            $objParse = ociparse($conn, $strSQL);  
             oci_execute($objParse);									
				 
			 } else  if(ociresult($s,"STOC")<$quantity and ociresult($s,"STOC")>0) echo' <h3> Numari de bucati prea mare!</h3> ';
			     else if(ociresult($s,"STOC")==0) echo' <h3> Produsul nu mai este in stoc!</h3>';
				 
				 echo '<p> Produsul ' .ociresult($s,"NUME"). ' are stocul ' .ociresult($s,"STOC").'</p>';
	  
		   }
		 }


?>
<?php 

	    $sss = ociparse($conn, "SELECT * FROM PRODUSE_PROJ  WHERE ID_PRODUS=$id");
             echo '<br />';
			 
 if(ociexecute($sss))
         {
           while (ocifetch($sss)) 
           {  
	    echo '<p> Produsul ' .ociresult($sss,"NUME"). ' are stocul ' .ociresult($sss,"STOC").'</p>';
		   }
		 }
?>
</section>

    
</body>
</html>