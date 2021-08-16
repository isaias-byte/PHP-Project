<?php
    $title = "View Records";
    require_once 'includes/header.php';
    require_once 'db/connection.php';
    
    //Get data for one specific person
    if (!isset($_GET['id'])) {
        echo "<h1 class='text-danger'>Please, check details and try again</h1>";
    }
    else {
        $result = $crud->getAttendeeDetails($_GET['id']);
    

?>

    <div class="card" style="width: 18rem;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['first_name'].' '.$result['last_name'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'];?></h6>
            <p class="card-text">Date of Birt: <?php echo $result['date_birth'];?></p>
            <p class="card-text">Email: <?php echo $result['email'];?></p>
            <p class="card-text">Phone Number: <?php echo $result['contact_number'];?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

<?php
    }
?>
<?php
    require_once 'includes/footer.php';
?>