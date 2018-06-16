<?php
require 'config.php';
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
        $flag2=0;
        $error="";
        if (empty($teamname) || empty($headname) || empty($regno) || empty($branch) || empty($semester) || empty($institution) || empty($phone) ||empty($email))
            {
                $_GLOBALS ["error"]= "All the fields are required to be filled!";
            }
        else
            {
                $sql="INSERT INTO user VALUES ('$teamname','$headname','$regno','$branch','$semester','$institution','$phone','$email')";
                mysqli_query($conn,$sql);
                $flag2=1;

            }            

}
