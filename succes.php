        <?php
            $title = "Succes";
            require_once 'includes/header.php';
            require_once 'db/connection.php';

            if (isset($_POST['submit'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $dateBirth = $_POST['dateBirth'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $specialty = $_POST['specialty'];
                $success = $crud->insert($firstName, $lastName, $dateBirth, $email, $phone, $specialty);

                if ($success) {
                    echo '<h1 class="text-center text-success">You have been registered!</h1>';
                }
                else {
                    echo '<h1 class="text-center text-danger">There was an error in processing...</h1>';
                }
            }

        ?>

        
        <!-- If I use GET, I only have to change $_GET to $_POST -->
        <div class="card" style="width: 18rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title"><?php echo $_POST['firstName'].' '.$_POST['lastName'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty'];?></h6>
                <p class="card-text">Date of Birt: <?php echo $_POST['dateBirth'];?></p>
                <p class="card-text">Email: <?php echo $_POST['email'];?></p>
                <p class="card-text">Phone Number: <?php echo $_POST['phone'];?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php
            //echo $_GET['firstName'];
        ?>

        <?php
            require_once 'includes/footer.php';
        ?>