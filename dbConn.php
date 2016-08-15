<!DOCTYPE html>
<html>
<head><title>Nume si varsta</title></head>
<body style="width: 500px;">
<?php 
/* Program PHP scufundat intr-un document HTML, 
   folosit la exemplificarea preluarii datelor receptionate 
   via un formular Web -- exemplu de cod de tip spaghetti
   
   Autor: Sabin-Corneliu Buraga - http://www.purl.org/net/busaco
   
   Ultima actualizare: 17 martie 2014 
*/
   
   $mysql = new mysqli (
 '127.0.0.1', // locatia serverului (aici, masina locala)
 'Fivi',       // numele de cont de acces la baza de date
 'XAWK4aXLp4',    // parola
 'Fivi'   // baza de date
 );

// verificam daca am reusit
if (mysqli_connect_errno()) {
 die ('Conexiunea a esuat...');
}

// formulam o interogare si o executam  
if (!($rez = $mysql->query ('select name,pass from students'))) {
 die ('A survenit o eroare la interogare');
}

// generam o lista numerotata cu informatii despre studenti
echo ('<ol>');
// preluam inregistrarile gasite   
while ($inreg = $rez->fetch_assoc()) {
 echo ('<li>Studentul ' . $inreg['name'] . 
  ' are parola ' . $inreg['pass'] . '</li>');
   if (!$_REQUEST["user"]) { // verificam daca s-a introdus numele
?> 
   <p style="color:red">Nu ati specificat numele!</p> 
<?php 
   } 
   else { 
       if($user==$inreg['username'])
     echo ("<p>Numele d-voastra este <em>" . $_REQUEST["user"] . "</em>.</p>"); 
   }
   // verificam daca s-a introdus parola
   $pass = $_REQUEST["password"];
   if (!$pass || $pass!=$inreg[password]) {
?> 
   <p style="color:red">Parola incorecta!</p> 
<?php 
   } 
   else { 
     echo ("<p>Pretindeti ca aveti parola " . $pass . "...</p>"); 
   }
 
}
echo ('</ol>');

// inchidem conexiunea cu serverul MySQL
$mysql->close();

   
?>
<hr />
</body>
</html>