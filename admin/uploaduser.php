<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>";   
    }

    $userLevel = Session::get('levels');
    if($userLevel == 1){  
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $registerData = $register->registration($_POST, $_FILES);
        }    
    }else{
        echo "<script>window.location='dashboard.php'</script>"; 
    }

    
?>
<body>
<div id="auth">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                        <h3>Sign Up</h3>
                        <p>Please fill the form to register.</p>
                        <span>
                            <?php
                                if(isset($registerData)){
                                    echo $registerData;
                                }
                            ?>
                        </span>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Your Image</label>
                                    <input type="file" id="first-name-column" class="form-control"  name="image">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">First Name</label>
                                    <input type="text" id="first-name-column" class="form-control"  name="firstName">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Last Name</label>
                                    <input type="text" id="first-name-column" class="form-control"  name="lastName">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username-column">Username</label>
                                    <input type="text" id="username-column" class="form-control" name="userName">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Email</label>
                                    <input type="email" id="last-name-column" class="form-control"  name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Password</label>
                                    <input type="password" id="country-floating" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Phone Number</label>
                                    <input type="number" id="country-floating" class="form-control" name="phoneNumber">
                                </div>
                            </div>
                        </diV>
                        <div class="clearfix">
                            <input type="submit" name="submit" class="btn btn-primary float-right">
                        </div>
                    </form>
                </div>
            </div><br><br><br>
        </div>
    </div>
</div>
</div>
<?php include('inc/footer.php');?>