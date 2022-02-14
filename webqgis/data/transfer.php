<!DOCTYPE html>
<html>

<head>
	<title>JSON to Database Transfer</title>
</head>

<body>
	<div class="container box">
		<h3 align="center">
			Geeks for Geeks Import JSON
			data into database
		</h3><br />
		
		<?php

			$connect = mysqli_connect("localhost", "root", "", "gravekeeper");
			
			$query = '';
			$table_data = '';
			
			$filename = "graves.json";
			$data = file_get_contents($filename);
			$array = json_decode($data, true);
			
			foreach($array as $row) {
				$query .= "INSERT INTO grave_data 
				VALUES ('".$row["Grave No."]."', '".$row["Name"]."', '".$row["Birth"]."', '".$row["Death"]."', '".$row["Visibility"]."', '".$row["Status"]."', '".$row["auxiliary_storage_labeling_offsetquad"]."', '".$row["coordinates"]."'); ";
			}

			if(mysqli_multi_query($connect, $query)) {
				echo "Transfer Successful";
			}else {
				echo "There was an error while transfering" . mysqli_error($connect);
			}
		?>
		<br />
	</div>
</body>

</html>
