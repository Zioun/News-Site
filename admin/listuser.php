<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
<?php
    $userLevel = Session::get('levels');
    if($userLevel == 1){
        if(isset($_GET['userdelete'])){
            $id = $_GET['userdelete'];
            $deleteUser = $user->deleteUser($id);
        }
        if(isset($_GET['updatelevel'])){
            $id = $_GET['updatelevel'];
            $updatelevel = $user->updateUserLevel($id);
        }    
    }
    
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User List</h3>
                <p class="text-subtitle text-muted">Slider News Data Table</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple User List
            </div>
            <div class="card-body">
                <?php
                    if(isset($deleteUser)){
                        echo $deleteUser;
                    }
                ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>User Image</th>
                            <th>User Name</th>
                            <?php
                            $userLevel = Session::get('levels');
                            if($userLevel == 1){  ?>
                                  <th>Position</th>
                            <?php } ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $getUserData = $user->getUserData();
                            
                            if($getUserData){
                                while($result = $getUserData->fetch_assoc()){     

                        ?>
                            <tr>
                                <td>
                                    <img height="150px;" width="150px;" src="./<?php echo $result['adminImage'];?>" alt="">
                                    <h6 class="user_position_name">
                                    <?php 
                                    if($result['levels']==1){
                                        echo "<span class='user_position_admin'>Admin</span>";
                                    }else{
                                        echo "<span class='user_position_reporter'>Reporter</span>";
                                    
                                    }
                                    ?>
                                    </h6>
                                </td>
                                <td>
                                    <?php echo $result['adminName'].' '.$result['adminLastName']?>
                                </td>
                                <?php
                                $userLevel = Session::get('levels');
                                if($userLevel == 1){
                                ?>
                                <td>
                                    <?php
                                    if($result['levels']==1){
                                        echo "<span class='promote_admin'><i data-feather='user' width='20'></i></span>";
                                    }else{ ?>
                                        <a href="?updatelevel=<?php echo $result['adminId'];?>" onclick="return confirm('Do you want promote to Admin?')" class='promote_reporter'><i data-feather="repeat" width="20"></i></a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                                <td>
                                    <a href="viewuser.php?viewuser=<?php echo $result['adminId'];?>" type="submit" class="btn btn-success btn-sm mr-1 mb-1"><i data-feather="search" width="20"></i></a>
                                    <?php
                                        $userLevel = Session::get('levels');
                                        $userId = Session::get('adminId');
                                        if($userLevel == 1 || $userId ==  $result['adminId']){
                                    ?>
                                    <a href="updateuser.php?updateuser=<?php echo $result['adminId'];?>" type="submit" class="btn btn-primary btn-sm mr-1 mb-1"><i data-feather="edit-3" width="20"></i></a>
                                    <?php } ?>
                                    <?php
                                        $userLevel = Session::get('levels');
                                        if($userLevel == 1){
                                    ?>
                                    <a href="?userdelete=<?php echo $result['adminId'];?>" type="submit" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Do you want to delete User.')"><i data-feather="x" width="20"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<?php include('inc/footer.php');?>
