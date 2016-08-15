<html>
<?php
include_once 'dbConnectionConfig.php';
	$user = $_POST['id'];
	$parola = $_POST['password'];
	if (!$user) {
?>
<head>
<title>Eroare!</title>
</head>

<body>
   <p style="color:red">Userul introdus nu este corect</p>
</body>

<?php
	}else{
		$conn=oci_connect(USER,PASSWORD,DATABASE);

		if (!$conn)
		{
			echo "<head><title>Eroare!</title></head>";
			echo "<body>Failed to connect to Oracle</body>";
		}else{
			$sqlInstruction="SELECT password AS pass FROM admins_juicy WHERE id='$user'";
			$s = oci_parse($conn, $sqlInstruction);
		    if(oci_execute($s))
		    {
		       if (oci_fetch($s)) 
		        {
		            $dbPass=ociresult($s, 'PASS');
		            if ($dbPass==$parola){
		            	echo "<head><title>Bun venit, " .$user . "!</title></head>";
		            	?>
						<body>
							<p>Login efectuat cu success</p>
							</br>
							<form action="uploadDataFromCSV.php" method="post" enctype="multipart/form-data">
								Select CSV file to upload:
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Incarca facturi din CSV" name="submit">
							</form>
							</br>
							<form action="downloadDataAsCSV.php" method="get">
								<input type="submit" value="Descarca facturi ca CSV" name="submit">
							</form>
						</body>						

						<?php
		            }else{
		            	echo "<head><title>Eroare!</title></head>";
		        		echo "<body>Parola introdusa nu este corecta!</body>";
		            }
		        } else{
		        	echo "<head><title>Eroare!</title></head>";
		        	echo "<body>Nu am gasit acest user in baza noastra de date</body>";
		        }
		    }
		}
	}
?>
</html>