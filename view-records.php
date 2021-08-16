<?php
    $title = "View Records";
    require_once 'includes/header.php';
    require_once 'db/connection.php';
    //Get data from all the records of our database
    $results = $crud->getAttendees();
?>

    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <td><?php echo $r['attendee_id']; ?></td>
                <td><?php echo $r['first_name']; ?></td>
                <td><?php echo $r['last_name']; ?></td>
                <td><?php echo $r['name']; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-danger">Delete</a>
                </td>
                
            </tr>
        <?php } ?>
    </table>

<?php
    require_once 'includes/footer.php';
?>