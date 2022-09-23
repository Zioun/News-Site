<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
    <!-- Profile variants section start -->
    <section id="bg-variants">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="section-title text-uppercase">Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-12">
                <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <img class="profile_img" src="./<?php echo $result['adminImage'];?>" alt="element 02"
                                        class="mb-1">
                                        <h3 class="card-title profile_name"><?php echo $result['adminName'].' '.$result['adminLastName'];?>
                                        <a type="submit" name="update" class="btn btn-primary mr-1 pro_edit_btn" href="updateprofile.php?adminId=<?php echo Session::get('adminId');?>"><i data-feather="edit-3" width="20"></i></a>
                                    </h3>
                                         <?php 
                                            Session::set('adminName', $result['adminName']);
                                            Session::set('adminLastName', $result['adminLastName']);
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group pro_details">
                                            <table>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td><h1 class="pro_del_text"><?php echo $result['adminName'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name </h1></td>
                                                    <td><h1 class="pro_del_text"><?php echo $result['adminLastName'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>User Name </h1></td>
                                                    <td><h1 class="pro_del_text"><?php echo $result['adminUser'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Email </h1></td>
                                                    <td><h1 class="pro_del_text"><?php echo $result['adminEmail'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone </h1></td>
                                                    <td><h1 class="pro_del_text"><?php echo $result['phoneNumber'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Position </h1></td>
                                                    <td> <h1 class="pro_del_text"><?php 
                                                    if($result['levels'] == 1){
                                                        echo 'Admin';
                                                    }else{
                                                        echo 'Reporter';
                                                    }
                                                    ?></h1></td>
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

<?php include('inc/footer.php');?>
