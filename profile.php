<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php
    $login = Session::get('userLogin');
    if($login == false){
        echo "<script>window.location='index.php'</script>";
    } 
  $getUserProfile = $userAuthentication->userProfileData();
  $userProfile = $getUserProfile->fetch_assoc();
?>
<section id="contentSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="left_content">
        <div class="contact_area">
          <h2>Profile</h2>
          <!-- Profile variants section start -->
  <section id="bg-variants">
      <div class="container">
          <div class="row">
              <div class="col-xl-12 col-sm-12 col-12">
              <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                      <img src="./<?php echo $userProfile['userImage'];?>" alt="element 02"
                                      class="mb-1 profile_ses_image">
                                      <h3 class="card-title profile_ses_name"><?php echo $userProfile['userFirstName'].' '.$userProfile['userLastName'];?>
                                      <a class="pro_up_btn" type="submit" name="update" class="btn btn-primary mr-1" href="updateprofile.php?adminId=<?php echo Session::get('userId');?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                      </h3>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group"">
                                          <table>
                                              <tr>
                                                  <td><h1 class="pro_dtl">First Name</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userFirstName'];?></td>
                                              </tr>
                                              <tr>
                                                  <td><h1 class="pro_dtl">Last Name</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userLastName'];?></h1></td>
                                              </tr>
                                              <tr>
                                                  <td><h1 class="pro_dtl">User Name</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userUsername'];?></h1></td>
                                              </tr>
                                              <tr>
                                                  <td><h1 class="pro_dtl">Email</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userEmail'];?></h1></td>
                                              </tr>
                                              <tr>
                                                  <td><h1 class="pro_dtl">Phone</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userPhone'];?></h1></td>
                                              </tr>
                                              <tr>
                                                  <td><h1 class="pro_dtl">Address</h1></td>
                                                  <td><h1 class="pro_info"><?php echo $userProfile['userAddress'];?></h1></td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <!-- Profile variants section end -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('inc/footer.php');?>