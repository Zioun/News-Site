<?php include('inc/header.php');?>
<?php
    $login = Session::get('userLogin');
    if($login == true){
        echo "<script>window.location='index.php'</script>";
    }
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
		$ChkUserLogin = $userAuthentication->checkUserAuthentication($_POST);
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
                            <form class="form" action="" method="POST">
                                <div class="row">
                                <div class="col-md-12 col-12">
                                    <h4 class="card-title login_header">User Login</h4><br>
                                    <?php
                                    if(isset($ChkUserLogin)){
                                        echo $ChkUserLogin;
                                    }
                                    ?>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">User Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="First Name"
                                                name="userUsername">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Password</label>
                                            <input type="password" id="last-name-column" class="form-control" placeholder="Last Name"
                                                name="userPassword">
                                        </div>
                                    </div> 
                                    <div class="col-12 d-flex justify-content-end" class="login_footer">
                                        <a class="reg_link" href="registration.php">Don't have an account?</a><br>
                                        <input type="submit" class="btn btn-primary mr-1 mb-1 login_submit_input" value="Submit" name="login">
                                        <button class=" btn btn-light-secondary mr-1 mb-1 reset_btn" type="reset">Reset</button><br><br>
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