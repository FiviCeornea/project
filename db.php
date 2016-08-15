 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "juicydb";

/*
* Conectare la baza de date
*/
$server = "localhost";
$username = "root";
$password = "";


$conn = mysql_connect($server,$username,$password);

if (!$conn)
  {
  die($errDbConn . mysql_error() . " :: " . mysql_errno());
  }

mysql_select_db($database, $conn);


/*
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

*/
/*


    $mysql = new mysqli ('127.0.0.1', 'root', '', 'juicydb' );
 
	if (mysqli_connect_errno()) {
		die ('Conexiunea a esuat...');
	}

	if (!($rez = $mysql->query ('select * from produse'))) {
		die ('A survenit o eroare la interogare');
	}


*/
?>

