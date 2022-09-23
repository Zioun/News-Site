<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>
<?php
    if(isset($_GET['updateNews'])){
        $id = $_GET['updateNews'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $newsUpdate = $news->newsUpdate($_POST, $_FILES, $id);
        }
    }

    $showNewsUpdateData = $news->showNewsDataId($id);
    $showNewsUP = $showNewsUpdateData->fetch_assoc();
    

?>  

<div class="main-content container-fluid">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload News</h4>
                        <?php
                            if(isset($newsUpdate)){
                                echo $newsUpdate;
                            }
                        ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <img src="./<?php echo $showNewsUP['newsImage'];?>" alt="sliderImage"><br>
                                            <label for="first-name-column">Slider Image</label>
                                            <input type="file" id="first-name-column" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Category</label><br>
                                            <select class="form-control" name="catID">
                                                <option value="">Select Option</option>
                                                <?php
                                                $getCatData = $news->getCatData();
                                                if($getCatData){
                                                    while($getCategoryData = $getCatData->fetch_assoc()){  
                                                ?>

                                                <option 
                                                <?php 
                                                    if($showNewsUP['category'] == $getCategoryData['id']){?>
                                                    selected = "selected"
                                                <?php } ?> value="<?php echo $getCategoryData['id'];?>"><?php echo $getCategoryData['categoryName'];?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input hidden type="text" name="updateNews" value="1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Heading</label><br>
                                            <textarea class="input_size" name="newsHeading" id="" rows="2"><?php echo $showNewsUP['newsHeading'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Paragraph</label><br>
                                            <textarea class="input_size" name="newsParagraph" id="" rows="5"><?php echo $showNewsUP['newsParagraph'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="submit" value="Update" class="btn btn-primary mr-1 mb-1">
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
