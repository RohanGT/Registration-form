<?php
        require 'config.php';
        $folder="uploads/";
        #$destination_path = getcwd().DIRECTORY_SEPARATOR;
        #$folder=(getcwd().DIRECTORY_SEPARATOR);
        @$fname=$_FILES["uploadfile"]["name"];
        @$fsize=$_FILES["uploadfile"]["size"];
        @$ftype=$_FILES["uploadfile"]["type"];
        #@$target_path = $destination_path . basename( $fname);
        $ext=strtolower(substr($fname, strpos($fname, '.')+1));
        $file=$folder.basename($fname);
        $flag=1;
        $data_dir="INSERT INTO file VALUES ('$file')";
        $error="";
        if(isset($fname))
        {
            if (!empty($fname)) {
                if(!file_exists($file))
                {
                    if($ftype=='application/pdf'&& $ext=='pdf')
                    {
                    }
                    else
                    {
                        $error="File must be pdf <br>";
                        $flag=0;
                    }

                    if($fsize<=5120000)
                    {
                        echo '';
                    }
                    else
                    {
                        $error= "File must be under 5mb<br>";
                        $flag=0;
                    }
                }
                else
                {
                    $error= "This file already exists";
                    $flag=0;
                }
            }
            else
            {
                $error= "Please choose a file.";
                $flag=0;
            }
            if($flag){

                if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $file)){
                #if(@move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)){
            
                    echo (mysqli_query($conn,$data_dir));
                    #header("Location: index.php");
                }
                else{
                    $error= "Sorry there was an error in uploading. Please try again.";
                }
            }   
            else{
                echo '';
            }
        }

  /*
    ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Task 3</title>
</head>
<body>
	

	<form action='<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]) ?>' method="POST" enctype="multipart/form-data">
		Select file to upload:
		<input type="file" name="uploadfile">
		<br>
		<input type="submit" name="upload" value="Upload">
	</form>

</body>
</html>

*/

