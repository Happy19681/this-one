<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>All Students</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add user
    </button>

</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>location</th>
            <th>Action</th>

        </tr>
    </thead>
    <?php

    $query = "SELECT * FROM  `clients`";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <tbody>


                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['location'] ?></td>
                    <td><a href="update_page_1.php? id=<?php echo $row['id'] ?>" class="btn btn-success" >Update </a>
                    <a href="delete_page.php? id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete </a></td>
                </tr>



        <?php
        }
    }

        ?>
            </tbody>
</table>
<?php

if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'] . "</h6>";
}

if (isset($_GET['insert_msg'])) {
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";
}

if (isset($_GET['update_msg'])) {
    echo "<h6>" . $_GET['update_msg'] . "</h6>";
}

if (isset($_GET['delete_msg'])) {
    echo "<h6>" . $_GET['delete_msg'] . "</h6>";
}
?>
<form action="insert_data.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add_users" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>