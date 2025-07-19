<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];



$query = "SELECT * FROM  `clients` where `id` = '$id'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query Failed" . mysqli_error($connection));
} else {
    $row = mysqli_fetch_assoc($result);
}



}




?>

<?php
if (isset($_POST['update_users'])) {

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $query = "UPDATE `clients` SET `name`='$name',`email`='$email',`phone`='$phone',`location`='$location' WHERE
        `id`='$idnew'";

        $result = mysqli_query($connection,$query);
        
    if (!$result) {
        die("Query Failed".mysqli_error($connection));
    }
    else{
        header('location:into.php?update_msg=Successfully updated');
    }
}
?>


<form action="update_page_1.php?id_new=<?php echo $id ?>" method="POST">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" value="<?php echo $row['phone'] ?>">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="<?php echo $row['location'] ?>">
        </div>

    </div>
    <input type="submit" class="btn btn-primary" name="update_users" value="Update">

</form>
<?php include('footer.php'); ?>