<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
<?php

    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }

    $userLevel = Session::get('levels');
    if($userLevel == 1){ 
        $getSquareBannerData = $banner->getSquareBannerData();
        $squareBanner = $getSquareBannerData->fetch_assoc();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $squareBannerUpdate = $banner->squareBannerUpdate($_POST, $_FILES);
        }    
    }else{
        echo "<script>window.location='dashboard.php'</script>" ;
    }

    

?>
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="container">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Banner</h4>
                        <?php
                            if(isset($squareBannerUpdate)){
                                echo $squareBannerUpdate;
                            }
                        ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <a href="<?php echo $squareBanner['urlLink'];?>" target="_blank">
                                                <img class="mb-2" src="./<?php echo $squareBanner['bannerImage'];?>" alt=""><br>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="feedback1">New Image</label>
                                        <input type="file" id="feedback1" class="form-control" value="<?php echo $squareBanner['bannerImage'];?>" name="image">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="feedback1">ULR Link</label>
                                            <input type="text" id="feedback1" class="form-control" value="<?php echo $squareBanner['urlLink'];?>" name="urlLink">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" value="Update" name="submit" class="btn btn-primary mr-1">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->
<?php include('inc/footer.php');?>