<?php
include_once 'dbConnectionConfig.php';
	$conn=oci_connect(USER,PASSWORD,DATABASE);
	if (!$conn)
	{
		echo "Failed to connect to DB";
	}else{
		$sqlInstruction="begin writeToCSV(); end;";
		$s = oci_parse($conn, $sqlInstruction);
	    if(oci_execute($s))
	    {
	       	header("Location: http://localhost/twjuicy/sqlStuff/exportFacturiCSV.csv");
	    }else{
	    	echo 'There was an error generating the file';
	    }
	    oci_free_statement($s);
	    oci_close($conn);
	}
?>