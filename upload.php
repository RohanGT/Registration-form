<?php

        require 'config.php';
        require 'form.php'
        $folder="uploads".DIRECTORY_SEPARATOR;
        @$fname=$_FILES["uploadfile"]["name"];
        @$fsize=$_FILES["uploadfile"]["size"];
        @$ftype=$_FILES["uploadfile"]["type"];
        $ext=strtolower(substr($fname, strpos($fname, '.')+1));
        $file=$folder.DIRECTORY_SEPARATOR.$regno.'.pdf';
        @$dir=realpath($file);
        $flag=1;
        if(isset($fname))
        {
            if (!empty($fname)) {
                if(!file_exists($file))
                {
                    if(!($ftype=='application/pdf'&& $ext=='pdf'))
                    {
                        $error="File must be pdf";
                        $flag=0;
                    }

                    if($fsize>5120000)
                    {
                        $error="File must be under 5MB";
                        $flag=0;
                    }
                }
                else
                {
                    $error="This file already exists";
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
                	if(is_readable($file) && is_uploaded ($file)){}
                	else
                		$error=" Sorry there was an error in uploading."
                		$flag=0;
                }

               

                
            }  
        }