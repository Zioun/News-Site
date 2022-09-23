<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>  
<?php
    $userLevel = Session::get('levels');
    if($userLevel == 1){  
        if(isset($_GET['sliderview'])){
            $id = $_GET['sliderview'];
            $showSliderData = $slider->showSliderData($id);
            $showSlider = $showSliderData->fetch_assoc();
        }   
    }else{
        echo "<script>window.location='dashboard.php'</script>" ;   
    }
    
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Single Slider News</h3>
                <p class="text-subtitle text-muted">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Card</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section id="content-types">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="./<?php echo $showSlider['sliderImage'];?>" alt="Card image cap" />
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $showSlider['newsHeading'];?></h4>
                            <p class="card-text">
                                <?php echo $showSlider['newsParagraph'];?>
                            </p>
                            <a href="sliderlist.php" class="btn btn-primary block">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('inc/footer.php');?>
