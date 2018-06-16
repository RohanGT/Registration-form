<?php

    #require 'connect.php';

    #$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword, $dbName);

    if(isset($_POST['submit']))

    {   

        $teamname=$_POST['teamname'];
        $headname=$_POST['headname'];
        $regno=$_POST['regno'];
        $branch=$_POST['branch'];
        $semester=$_POST['semester'];
        $institution=$_POST['institution'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

    }
    require 'validation.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $teamname=valid($teamname);
        $headname=valid($headname);
        $regno=valid($regno);
        $branch=valid($branch);
        $semester=valid($semester);
        $institution=valid($institution);
        $phone=valid($phone);
    }
        if (empty($teamname) || empty($headname) || empty($regno) || empty($branch) || empty($semester) || empty($institution) || empty($phone) ||empty($email))

            {

                //echo "All the fields are required to be filled!";

            }
        
        else

            {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo $emailErr = "Invalid email format"; 

                $sql="INSERT INTO users (team_name,headname,regno,

                branch,semester,institution,phone,email) VALUES ('$teamname','$headname','$regno','$branch','$semester','$institution','$phone','$email');";

                mysqli_query($connect,$sql);

                //header("Location:register.php?success");

                }
            }            



?>