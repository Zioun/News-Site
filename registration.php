<?php include('inc/header.php');?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $getUserRegistration = $userRegistration->registration($_POST, $_FILES);
} 


?>
<!-- // Basic multiple Column Form section start -->
<div class="container-fluid">
<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-md-12 col-12">
                                    <h4 class="card-title reg_heading">User Registration</h4>
                                    <?php
                                        if(isset($getUserRegistration)){
                                            echo $getUserRegistration;
                                        }
                                    ?>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Image</label>
                                            <input readonly hidden type="text" value="admin/uploads/profile.jpg" name="userImageUrl">

                                            <input type="file" id="first-name-column" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="First Name"
                                                name="userFirstName">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Last Name"
                                                name="userLastName">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">User Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="User Name"
                                                name="userUsername">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Email</label>
                                            <input type="email" id="city-column" class="form-control" placeholder="Eamil" name="userEmail">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Password</label>
                                            <input type="password" id="country-floating" class="form-control" name="userPassword"
                                            placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Phone Number</label>
                                            <input type="number" id="company-column" class="form-control" name="userPhone"
                                            placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Address</label>
                                            <input type="text" id="company-column" class="form-control" name="userAddress"
                                            placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a class="log_link" href="login.php">You have an account?</a><br>
                                        <input type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 reg_sub_btn">
                                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1 reg_reset">Reset</button><br><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- // Basic multiple Column Form section end -->
<?php include('inc/footer.php');?>