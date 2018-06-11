<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Task 3</title>
</head>
<body>
	<?php
		require 'connect.php';
	?>
	<?php
		$folder="uploads/";
		@$fname=$_FILES["uploadfile"]["name"];
		@$fsize=$_FILES["uploadfile"]["size"];
		@$ftype=$_FILES["uploadfile"]["type"];
		$ext=strtolower(substr($fname, strpos($fname, '.')+1));
		$file=$folder.basename($fname);
		$flag=1;
		@$dir=realpath($file);
		$data_dir="INSERT INTO upload_details(file_dir) VALUES ('$dir')";

		if(isset($fname))
		{
			if (!empty($fname)) {
				if(!file_exists($file)){
					if($ftype=='application/pdf'&& $ext=='pdf')
					{
						echo '';
					}
					else{
						echo "File must be pdf <br>";
						$flag=0;
					}

					if($fsize<=5120000)
					{
						echo '';
					}
					else{
						echo "File must be under 5mb<br>";
						$flag=0;
					}
				}
				else{
					echo "This file already exists";
					$flag=0;
				}
			}
			else
			{
				echo "Please choose a file.";
				$flag=0;
			}

			if($flag){
				if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $file)){

					mysqli_query($connect,$data_dir);
					header("Location:uploaded.php");
				}
				else{
					echo "Sorry there was an error in uploading. Please try again.";
				}
			}	
			else{
				echo '';
			}
		}
	?>

	<form action="task3.php" method="POST" enctype="multipart/form-data">
		Select file to upload:
		<input type="file" name="uploadfile">
		<br>
		<input type="submit" name="upload" value="Upload">
	</form>

</body>
</html>

