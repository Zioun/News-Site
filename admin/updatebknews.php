<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>

<?php
    
    if(isset($_GET['updatebk'])){
        $id = $_GET['updatebk'];
        $getBreakingNewsId = $breaking->getBreakingNewsId($id);
        $getBKNID = $getBreakingNewsId->fetch_assoc();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateBKNews = $breaking->breakingNewsUpdate($_POST, $_FILES, $id);
    }     

?>

<div class="main-content container-fluid">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Breaking News</h4>
                        <?php
                            if(isset($updateBKNews)){
                                echo $updateBKNews;
                            }
                        ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title Image</label><br>
                                            <img height="170px;" width="250px;" src="<?php echo $getBKNID['titleImage'];?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Add New Image</label><br>
                                            <input type="file" id="feedback1" class="form-control" value="" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Heading</label><br>
                                            <textarea class="input_size" name="newsHeading" rows="5"><?php echo $getBKNID['newsHeading'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="submit" class="btn btn-primary mr-1 mb-1" value="Update">
                                        <a href="breakingnews.php" type="reset" class="btn btn-light-secondary mr-1 mb-1">Back</a>
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
