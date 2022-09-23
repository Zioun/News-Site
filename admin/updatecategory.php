<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>

<?php
    $userLevel = Session::get('levels');
    if($userLevel == 1){ 
        if(isset($_GET['categoryUpdate'])){
            $id = $_GET['categoryUpdate'];
            $getCategoryId = $category->getCategoryId($id);
            $getCateogry = $getCategoryId->fetch_assoc();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $updateCategory = $category->categoryUpdate($_POST, $id);
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
                        <h4 class="card-title">Update Breaking News</h4>
                        <?php
                            if(isset($updateCategory)){
                                echo $updateCategory;
                            }
                        ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">News Heading</label><br>
                                            <input type="text" name="categoryName" class="form-control" value="<?php echo $getCateogry['categoryName'];?>">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" name="submit" class="btn btn-primary mr-1 mb-1" value="Update">
                                        <a href="listcategory.php" type="reset" class="btn btn-light-secondary mr-1 mb-1">Back</a>
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
