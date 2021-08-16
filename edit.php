<?php
    $title = "Edit a Record";
    require_once 'includes/header.php';
    require_once 'db/connection.php';
    $results = $crud->getSpecialties();

    if (!isset($_GET['id'])) {
        echo "<h1 class='text-danger'>Error, edit.php...</h1>";
    }
    else {
        $attendee = $crud->getAttendeeDetails($_GET['id']);
    
?>


    <h1 class="text-center">Edit Record</h1>
    <form method="POST" action="edit-post.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'];?>"></input>
        <div class="mb-3">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value=<?php echo $attendee['first_name'];?>>
            
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value=<?php echo $attendee['last_name'];?>>
        </div>
        <div class="mb-3">
            <label for="dateBirth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dateBirth" name="dateBirth" value=<?php echo $attendee['date_birth'];?>>
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'];?>" <?php if ($r['specialty_id'] == $attendee['specialty_id']) { echo 'selected'; }?>>
                    <?php echo $r['name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value=<?php echo $attendee['email'];?>>
            
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone number</label>
            <input type="text" class="form-control" id="phone" name="phone" value=<?php echo $attendee['contact_number'];?>>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
        </div>
    </form>

<?php
    }
?>

<?php
    require_once 'includes/footer.php';
?>