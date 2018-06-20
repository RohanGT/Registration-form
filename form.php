<?php
require 'config.php';
require 'validation.php';
 if(isset($_POST['submit']))
    {   
        $teamname=valid($_POST['teamname']);
        $headname=valid($_POST['headname']);
        $regno=valid($_POST['regno']);
        $branch=valid($_POST['branch']);
        $semester=valid($_POST['semester']);
        $institution=valid($_POST['institution']);
        $phone=valid($_POST['phone']);
        $email=valid($_POST['email']);
        $flag2=0;
        if (empty($teamname) || empty($headname) || empty($regno) || empty($branch) || empty($semester) || empty($institution) || empty($phone) ||empty($email))
            {
                $error= "All the fields are required to be filled!";
            }
        else
            {
                
                #mysqli_query($conn,$sql);
                $flag2=1;

            }            

}
