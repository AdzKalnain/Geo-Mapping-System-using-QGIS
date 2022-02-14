<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<?php

		$connect = mysqli_connect("localhost", "root", "", "gravekeeper");
		$query = "";
		// $table_data = "";
		$file_name = "graves.json";
		$data = file_get_contents($file_name); 
		$array = json_decode($data, true);

		$grave_no = $array['Grave No.'];
		$name = $array['Name'];
		$birth = $array['Birth'];
		$death = $array['Death'];
		$visibility = $array['Visibility'];
		$status = $array['Status'];
		$coordinates = $array['coordinates'];

		$query = "INSERT INTO grave_data(grave_no, name, birth, death, visibility, status, coordinates) 
				VALUES ('$grave_no', '$name', '$birth', '$death', '$visibility', '$status', '$coordinates')";

		if (mysqli_query($connect,$query)) {
			echo "Transfer Successful";
		}else {
			die('Error : Query Not Executed.' .mysqli_error($connect));
		}
	?>

</body>
</html>