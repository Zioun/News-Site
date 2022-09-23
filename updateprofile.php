<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php 
    $login = Session::get('userLogin');
    if($login == false){
        echo "<script>window.location='index.php'</script>";
    } 
  $getUserProfile = $userAuthentication->userProfileData();
  $userProfile = $getUserProfile->fetch_assoc();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = Session::get('userId');
    $profileUpdate = $userAuthentication->profileUpdate($_POST, $_FILES, $id);
  }
?>
<section id="contentSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Update Profile</h2>
                    </div>
                </div>
                <section id="multiple-column-form">
                    <div class="match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <?php
                                        if(isset($profileUpdate)){
                                            echo $profileUpdate;
                                        }
                                    ?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                    <img class="mb-2 pro_up_img" src="./<?php echo $userProfile['userImage'];?>" alt=""><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="feedback1">New Image</label>
                                                    <input type="file" id="feedback1" class="form-control" value="" name="image">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="feedback1">Name</label>
                                                        <input type="text" id="feedback1" class="form-control" value="<?php echo $userProfile['userFirstName'];?>" name="userFirstName">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="feedback4">Last Name</label>
                                                        <input type="text" id="feedback4" class="form-control" value="<?php echo $userProfile['userLastName'];?>" name="userLastName">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="feedback4">User Name</label>
                                                        <input type="text" id="feedback4" class="form-control" value="<?php echo $userProfile['userUsername'];?>" name="userUsername">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="feedback2">Email</label>
                                                        <input type="email" id="feedback2" class="form-control" value="<?php echo $userProfile['userEmail'];?>" name="userEmail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label for="feedback2">Phone</label>
                                                    <input type="number" id="feedback2" class="form-control" value="<?php echo $userProfile['userPhone'];?>" name="userPhone">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input type="submit" value="Update" name="submit" class="btn btn-primary mr-1 pro_up_submit"><br><br><br>
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
        </div>
    </div>
</section>
<?php include('inc/footer.php');?>