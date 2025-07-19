<?php include('dbcon.php'); ?>
   

<?php
     
     if(isset($_GET['id'])){

          $id= $_GET['id'];

         $query = "DELETE from `clients` where `id`='$id'";
           
         $result = mysqli_query($connection, $query);

         if(!$result){
            die("Query Failed".mysqli_error($connection));
         }
           else{
            header('location:into.php?delete_msg=delete sucessfully');
           }



     }

   
?>




<?php include('dbcon.php'); ?>