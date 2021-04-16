<?php
 if(isset($_POST['submit'])){
     
     $file = $_FILES['file'];
     $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
     $fileSize = $_FILES['file']['size'];
     $fileError = $_FILES['file']['error'];
     $fileType = $_FILES['file']['type'];

     //seperate file into two parts at the fullstop point
     $fileParts = explode('.',$fileName);
     //gets the end part of the seperated fill parts and converts it to lowercase
     $fileExtention = strtolower(end($fileParts));
     //the types of files allowed to be uploaded
     $allowedFiles = array('jpg','jpeg','png');
     //checks if file type is allowed to be uploaded
     if(in_array($fileExtention,$allowedFiles)){
         //checks if there was an error when uploading file
         if($fileError === 0){
             //checks if filesize is less than 100mb
             if($fileSize<100000){
                 //generates a unique id to be used as file name from current time
                 $fileNewName = uniqid(" ",true).'.'.$fileExtention;
                 //destination for the file to be uploaded to
                 $fileDestination = 'uploads/' . $fileNewName;
                 //function to actually move the file from temporary location to where we want th file to bee
                 move_uploaded_file($fileTmpName,$fileDestination);
                 header('Location:index.php?status=uploaded');

                 
             }else{
                echo 'File size too big';
            }

         }else{
         echo 'Error uploading file';
     }
         
     }else{
         echo 'file type not allowed';
     }



 }
     

