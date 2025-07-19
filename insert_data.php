<?php
include'dbcon.php';

if (isset($_POST['add_users'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $location = $_POST['location'];


   if ($name == "" || empty($name)) {
      header('location:into.php?message=You need to fill in the name!');
   } else {

      $query = "INSERT INTO `clients` (`name`, `email`, `phone`, `location`)
      VALUES ('$name ','$email',' $phone ',' $location')";


      $result = mysqli_query($connection, $query);

      if(!$result){
         die("Query Failed".mysqli_error($connection));
      }
        else{
         header('location:into.php?insert_msg=Inserting Done');
        }
   }
}
