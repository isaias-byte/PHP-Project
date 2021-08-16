<?php
    $title = "View Records";
    require_once 'db/connection.php';

    if (!$_GET['id']) {
        echo '<h1 class="text-center text-danger">There was an error in processing...</h1>';
    }
    else {
        //Call Delete function
        $result = $crud->deleteAttendee($_GET['id']);
        if ($result) {
            header("Location: view-records.php");
        } else {

        }
        //Go back to Index Page

    }
?>

<?php
    //}
?>

<?php
    require_once 'includes/footer.php';
?>