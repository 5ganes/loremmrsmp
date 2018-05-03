<!-- <meta charset="utf-8"> -->
<?php
	include('clientobjects.php');
	// echo "\xEF\xBB\xBF";
	if(isset($_POST["save"]))
	{
		$file = $_FILES['excel']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			// $filesop = array_map("utf8_encode", $filesop); //added
			// print_r($filesop);
			$name = $filesop[0];
			$address = $filesop[1];
			$email = $filesop[2];
			// echo $name.'<br>';
		 	$sql = mysql_query("INSERT INTO csv (id, name, address, email) VALUES ('','$name','$address','$email')");
		}
		// die();
		if($sql){
		 	echo "You database has imported successfully";
		}
		else{
		 	echo "Sorry! There is some problem.";
		}
	} 
?>
<form method="POST" action="" enctype="multipart/form-data">
	<label>Browse an excel file: </label>
	<input type="file" name="excel" /><br><br>

	<input type="submit" name="save" value="Save">
</form>