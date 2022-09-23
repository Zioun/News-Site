<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 

<?php

    if(isset($_GET['viewuser'])){
        $id = $_GET['viewuser'];
        $getViewUserId = $user->getUserIdData($id);
        $viewUser = $getViewUserId->fetch_assoc();
    } 
    if(isset($_GET['viewuser'])){
        $id = $_GET['viewuser'];
        $reportCount = $news->getReporterRows($id);
    } 

?>
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
                        <h4  class="card-title">Details Profile</h4>
                        <a onclick="window.print()" class="print_btn"><i data-feather="printer" width="20"></i></a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                        <img style="width:215;height:270px; border-radius: 50%;display: block;margin-left: auto;margin-right: auto;width: 280px;" src="./<?php echo $viewUser['adminImage'];?>" alt="element 02"
                                        class="mb-1">
                                        <h3 class="card-title" style="margin-top:30px;text-align:center;font-size:23px;"><?php echo $viewUser['adminName'].' '.$viewUser['adminLastName'];?>
                                        <?php
                                            if(Session::get('reporterRows')>=10){?>
                                                <span style="color:white;background:#F7D000;padding-left:4px;padding-right:4px;border-radius:50px;"><i data-feather="award" width="20"></i></span>
                                        <?php } ?>
                                    </h3>
                                         <?php 
                                            Session::set('adminName', $viewUser['adminName']);
                                            Session::set('adminLastName', $viewUser['adminLastName']);
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group"  style="margin-top:40px;">
                                            <table>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td><h1 style="font-size:18px;margin-left:10px;"><?php echo $viewUser['adminName'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name </h1></td>
                                                    <td><h1 style="font-size:18px;margin-left:10px;"><?php echo $viewUser['adminLastName'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>User Name </h1></td>
                                                    <td><h1 style="font-size:18px;margin-left:10px;"><?php echo $viewUser['adminUser'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Email </h1></td>
                                                    <td><h1 style="font-size:18px;margin-left:10px;"><?php echo $viewUser['adminEmail'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone </h1></td>
                                                    <td><h1 style="font-size:18px;margin-left:10px;"><?php echo $viewUser['phoneNumber'];?></h1></td>
                                                </tr>
                                                <tr>
                                                    <td>Position </h1></td>
                                                    <td> <h1 style="font-size:18px;margin-left:10px;"><?php 
                                                    if($viewUser['levels'] == 1){
                                                        echo 'Admin';
                                                    }else{
                                                        echo 'Reporter';
                                                    }
                                                    ?></h1></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Reports </h1></td>
                                                    <td>
                                                        <h1 style="font-size:18px;margin-left:10px;"><?php echo Session::get('reporterRows');?></h1>
                                                    </td>
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
