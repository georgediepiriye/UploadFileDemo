

 <form action="upload.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="file"> 
   <input type="submit" name="submit" value="upload">
 </form>

<?php if(isset($_GET['status'])){
           if($_GET['status']==='uploaded'){
               echo 'file uploaded successfully';

           }

}
?>