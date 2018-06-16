<?php

    session_start();

?>

<!DOCTYPE HTML>

<html>

<head>

    <title>Registration</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>

    <?php 
        require 'upload.php';
        ?>

    <div class="divider"></div>

    <div id="container">

        <form method="POST" enctype="multipart/form-data" action='<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]) ?>' >

            <p id="register">Register.</p>

            <input type='text' name='teamname' placeholder="team name" required >

            <input type='text' name='headname' placeholder="team leader" required>

            <input type="number" name="regno" min="150000000" max ="180000000" placeholder="registration no" required >

            <input type="text" name="branch" placeholder="branch" required>   

            <input type="number" name="semester" min="1" max ="8" placeholder="semester" required>

            <input type="text" name="institution" placeholder="institution" required>

            <input type="number" name="phone" min="1000000000" max="9999999999" placeholder="phone no" required>

            <input type="email" name="email" placeholder="email" required>

            <input type="file" name="fileToUpload" id="fileToUpload" required>

            <input id="browse-click" type="button" class="button" value="Browse files"/>

            <p id="filename" style="height: 0px; margin: 0;"></p>

            <input type="submit" name="submit" id="submit" >

        </form>

    </div>

</body>

<script src="jscript.js"></script>

</html>

<?php 
    require 'register.php';
    ?>