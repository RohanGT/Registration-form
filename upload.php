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
		$file_dir="INSERT INTO details(filepath) VALUES ('$dir')";

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

					mysqli_query($connect,$file_dir);
					header("Location:uploadsuccess.php");
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

