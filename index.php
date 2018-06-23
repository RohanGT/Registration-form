

<?php
    $_SESSION['allowed']=false; 

    $error="";
    require 'config.php';
    require 'upload.php';
    #require 'form.php';
    if (@$flag==1 && @$flag2==1)
    {
        rename ('uploads'.DIRECTORY_SEPARATOR.basename($fname), 'uploads'.DIRECTORY_SEPARATOR.$regno.'.pdf');
        #$file=$folder.DIRECTORY_SEPARATOR.$regno.'.pdf';
        $dir=realpath($file);
        $dir= str_replace("\\", "/",$dir); #****
        $sql="INSERT INTO user VALUES ('$teamname','$headname','$regno','$branch','$semester','$institution','$phone','$email', '$dir')";

        if (mysqli_query($conn,$sql) )
            header ("Location: success.php");
    }

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
    
    <div id="container">
        <form method="post" enctype="multipart/form-data" action='<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]) ?>' >
            <p id="register">Register</p>
            <input type='text' name='teamname' placeholder="team name" required value=<?php if  ($error!='') echo $teamname; ?>>
            <input type='text' name='headname' placeholder="team leader" required value=<?php if  ($error!='') echo $headname; ?>>
            <input type="number" name="regno" min="150000000" max ="180000000" placeholder="registration no" required value=<?php if  ($error!='') echo $regno; ?>>
            <input type="text" name="branch" placeholder="branch" required value=<?php if  ($error!='') echo $branch; ?>>   
            <input type="number" name="semester" min="1" max ="8" placeholder="semester" required value=<?php if  ($error!='') echo $semester; ?>>
            <input type="text" name="institution" placeholder="institution" required value=<?php if  ($error!='') echo $institution; ?>>
            <input type="number" name="phone" min="1000000000" max="9999999999" placeholder="phone no" required value=<?php if  ($error!='') echo $phone; ?>>
            <input type="email" name="email" placeholder="email" required value=<?php if  ($error!='') echo $email; ?>>
            <input type="file" name="uploadfile" id="fileToUpload" >
            <input id="browse-click" type="button" class="button" value="Browse files"/>
            <span id="error" style="height:0px; margin: 0;"><?php echo   $error; ?></span>
            <span id="filename" style="height:0px; margin: 0;"></span>
            <input type="submit" name="submit" id="submit" >
        </form>
       
    </div>
</body>

<script>
    var textbody=document.getElementById("filename");
    file=document.getElementById("fileToUpload");
    actualbutton=document.getElementById ("browse-click")
    actualbutton.addEventListener ("click", function()
    {
        file.click();
    });

    document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Please enter valid data");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
    setInterval (function()
    {
        //textbody=document.getElementById("filename");
        file=document.getElementById("fileToUpload");
        console.log(file.value.lastIndexOf('\\'));
        
        if (file.value!="")
            textbody.style="height: auto"
            textbody.innerHTML=file.value.slice (file.value.lastIndexOf('\\')+1);
    }, 500);


    
</script>
</html>