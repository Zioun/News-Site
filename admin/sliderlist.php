<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }
     
    $userLevel = Session::get('levels');
    if($userLevel == 1){  
        if(isset($_GET['sliderdelete'])){
            $id = $_GET['sliderdelete'];
            $deleteSliderNews = $slider->deleteSliderNews($id);
        }   
    }else{
        echo "<script>window.location='dashboard.php'</script>" ; 
    }
    
    
    
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Slider News</h3>
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
                Simple Slider News
            </div>
            <div class="card-body">
                <?php
                    if(isset($deleteSliderNews)){
                        echo $deleteSliderNews;
                    }
                ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Paragraph</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $getSliderData = $slider->getSliderData();
                            
                            if($getSliderData){
                                while($getSlider = $getSliderData->fetch_assoc()){     

                        ?>
                            <tr>
                                <td>
                                    <img height="70px;" width="100px;" src="./<?php echo $getSlider['sliderImage'];?>" alt="">
                                </td>
                                <td>
                                    <?php echo $fm->textShorten($getSlider['newsHeading'],50);?>
                                </td>
                                <td>
                                    <?php echo $fm->textShorten($getSlider['newsParagraph'],50);?>
                                </td>
                                <td>
                                    <a href="sliderview.php?sliderview=<?php echo $getSlider['id'];?>" type="submit" class="btn btn-success btn-sm mr-1 mb-1"><i data-feather="search" width="20"></i></a><br>
                                    <a  href="sliderupdate.php?sliderupdate=<?php echo $getSlider['id'];?>" type="submit" class="btn btn-primary btn-sm mr-1 mb-1"><i data-feather="edit-3" width="20"></i></a><br>
                                    <a href="?sliderdelete=<?php echo $getSlider['id'];?>" type="submit" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Do you want to delete Slider News.')"><i data-feather="x" width="20"></i></a>
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
