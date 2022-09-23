<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>  

<?php
    
    if(isset($_GET['deletebk'])){
        $id = $_GET['deletebk'];
        $deleteBreakingNews = $breaking->DeleteBreakingNews($id);
    }
    
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Breaking News</h3>
                <p class="text-subtitle text-muted">Breaking News Data Table</p>
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
                Simple Breaking News
            </div>
            <div class="card-body">
                <?php
                    if(isset($deleteBreakingNews)){
                        echo $deleteBreakingNews;
                    }
                ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Reporter</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $getBreakingNews = $breaking->getBreakingNews();
                            
                            if($getBreakingNews){
                                while($result = $getBreakingNews->fetch_assoc()){

                        ?>
                            <tr>
                                <td>
                                    <img height="70px;" width="100px;" src="<?php echo $result['titleImage'];?>" alt="">
                                </td>
                                <td>
                                    <?php echo $result['newsHeading'];?>
                                </td>
                                <td>
                                    <span class="reporter_name">
                                        <?php echo $result['adminName'];?>
                                    </span>
                                </td>
                                <td>
                                <?php
                                        $userLevel = Session::get('levels');
                                        $userName = Session::get('adminName');
                                        if($userLevel == 1 || $userName ==  $result['adminName']){
                                    ?>
                                    <a href="updatebknews.php?updatebk=<?php echo $result['id'];?>" type="submit" class="btn btn-primary btn-sm mr-1 mb-1"><i data-feather="edit-3" width="20"></i> </a>
                                    <a href="?deletebk=<?php echo $result['id'];?>" type="submit" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Do you want to delete Breaking News.')"><i data-feather="x" width="20"></i> </a>
                                <?php }else{ ?>
                                    <span class="btn_none" class="btn btn-success btn-sm mr-1 mb-1">None</span>
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
