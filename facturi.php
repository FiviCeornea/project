<!doctype html>
<head>

 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="shortcut icon" href="C:\Users\Priscilia\Pictures\twjuicy\bottle1.ico" />
  <title >Facturi</title>
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
include ('paginate.php');

 $reload = $_SERVER['PHP_SELF'] ;//. "" . $page;

$conn=oci_connect("system","rucurucu","localhost:1522/orcl");
	If (!$conn)
		echo 'Failed to connect to Oracle';
	$total_result=600;
	$s = ociparse($conn, "SELECT COUNT(*)  FROM FACTURI f, PRODUSE_FACTURA p WHERE f.NR_FACTURA=p.NR_FACTURA");
	
	

	
     $targetpage="paginare.php";
	 $adjacents=3;
	 $limit=5;
	 	$total_pages=ceil($total_result/$limit);
		
	 if(isset($_GET['page'])) {
    $page = $_GET['page'];
	
} else {
    $page = '1';
}
	 if($page){

		  $start=($page-1)*$limit;
	 }
	  else $start=0;
	  
	  $upperLimit = $start + $limit;
	  
	  
$ss=ociparse($conn, "select * from(select b.*, rownum as rn from (select j.nr_factura, p.nume,p.id_produs, p.pret  from produse_factura_juicy j  RIGHT JOIN  produse_proj p  ON  j.id_produs=p.id_produs  order by j.nr_factura ASC) b where rownum<= :upper) where rn>:s");

oci_bind_by_name($ss, ":s", $start);
oci_bind_by_name($ss, ":upper", $upperLimit);


		if ($page == 0) 
			$page = 1;
	$prev = $page - 1;
	$next = $page +1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;
	 echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $page, $total_pages);
                    }
                    echo "</ul></div>";
	
?>

	<?php
	ini_set('max_execution_time', 300);
	

	 if(oci_execute($ss))
	 {
	
	  while(ocifetch($ss)){
		  
		 echo ' <table cellpadding="10" cellspacing="1">';
		 echo ' <tr>';
	     echo '<td>'.ociresult($ss,"NR_FACTURA").'</td>';
		 echo' <td>' .ociresult($ss,"NUME").'</td>';
		 echo' <td>' .ociresult($ss,"PRET").'</td>';
		 echo' <td>' .ociresult($ss,"ID_PRODUS").'</td>';
		 echo '</tr> </table>';
	  }
	 }    else
    {
	$e = oci_error($ss); 
        echo htmlentities($e['message']);
    }
	?>


	
	

</section>

    
</body>
</html>