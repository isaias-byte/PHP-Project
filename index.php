        <?php
            $title = "Index";
            require_once 'includes/header.php';
            require_once 'db/connection.php';
            $results = $crud->getSpecialties();
        ?>

        
            <h1 class="text-center">Registration for conferences</h1>
            <form method="POST" action="succes.php">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                    
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName">
                </div>
                <div class="mb-3">
                    <label for="dateBirth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateBirth" name="dateBirth">
                </div>
                <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty</label>
                    <select class="form-select" id="specialty" name="specialty">
                        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['specialty_id']; ?>"><?php echo $r['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        

        <?php
            require_once 'includes/footer.php';
        ?>