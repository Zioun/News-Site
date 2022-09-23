<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }
    $userLevel = Session::get('levels');
    if($userLevel == 1){  
        if(isset($_GET['sliderupdate'])){
            $id = $_GET['sliderupdate'];
        }  
        
        $showUpdateData = $slider->showUpdateData($id);
        $showUpData = $showUpdateData->fetch_assoc();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sliderUpdate = $slider->sliderUpdate($_POST, $_FILES, $id);
        }
    }else{
        echo "<script>window.location='dashboard.php'</script>" ;
    }
    

?>  

<div class="main-content container-fluid">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload Slider News</h4>
                        <?php
                            if(isset($sliderUpdate)){
                                echo $sliderUpdate;
                            }
                        ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <img class="update_img" src="./<?php echo $showUpData['sliderImage'];?>" alt="sliderImage"><br>
                                            <label for="first-name-column">Slider Image</label>
                                            <input type="file" id="first-name-column" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Heading</label><br>
                                            <textarea class="input_size" name="newsHeading" id="" rows="2"><?php echo $showUpData['newsHeading'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Paragraph</label><br>
                                            <textarea class="input_size" name="newsParagraph" id="" rows="5"><?php echo $showUpData['newsParagraph'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="submit" class="btn btn-primary mr-1 mb-1">
                                        <input type="reset" class="btn btn-light-secondary mr-1 mb-1">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

<?php include('inc/footer.php');?>
