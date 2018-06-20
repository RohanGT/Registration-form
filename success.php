<?php
	if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Success!</title>
</head>
<body>
	<h2>Success</h2>
</body>
</html>