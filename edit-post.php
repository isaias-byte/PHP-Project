<?php
    require_once 'db/connection.php';
    $title = "Succes Editing";

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dateBirth = $_POST['dateBirth'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //Call a specific function to edit a record
        $result = $crud->editAttendee($id, $firstName, $lastName, $dateBirth, $email, $phone, $specialty);
        //Return to Index Page
        if ($result) {
            header("Location: index.php");
        }
        else {
            echo "<h1 class='text-danger'>Error, edit-post.php (result)</h1>";
        }
    }
    else {
        echo "<h1 class='text-danger'>We cannot edit this record, check if it exists...</h1>";
    }

?>