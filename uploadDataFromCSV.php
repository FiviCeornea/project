<?php
include_once 'dbConnectionConfig.php';
$target_dir='sqlStuff/';
$target_file=$target_dir.'facturiCSV.csv';

$uploaded_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploaded_file_type=pathinfo($uploaded_file, PATHINFO_EXTENSION);

$uploadOK=1;

if($uploaded_file_type != "csv"){
	echo 'Sorry, only CSV files are allowed';
	$uploadOK=0;
}

if($uploadOK == 0){
	echo 'Your file was not uploaded';
}else{
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo 'The file was uploaded';

		$conn=oci_connect(USER,PASSWORD,DATABASE);

		if (!$conn)
		{
			echo "Failed to connect to DB";
		}else{
			$sqlInstruction="begin readFromCSV(); end;";
			$s = oci_parse($conn, $sqlInstruction);
		    if(oci_execute($s))
		    {
		       echo 'DB updated';
		    }else{
		    	echo 'There was an error updating the DB';
		    }
		    oci_free_statement($s);
		    oci_close($conn);
		}
	}else{
		echo 'Sorry, there was an error';
	}
}