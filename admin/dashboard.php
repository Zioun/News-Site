<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>   
<?php
    $getBreakingNewsRows = $breaking->getBreakingNewsRows();
    $getSliderDataRows = $slider->getSliderDataRows();
    $getCategoryDataRows = $category->getCategoryDataRows();
    $getBusinessNewsRows = $news->getBusinessNewsRows();
    $getFashionNewsRows = $news->getFashionNewsRows();
    $getTechnologyNewsRows = $news->getTechnologyNewsRows();
    $getPoliticsNewsRows = $news->getPoliticsNewsRows();
    $getGameNewsRows = $news->getGameNewsRows();
    $getNewsRows = $news->getNewsRows();
    $getUserRows = $user->getUserRows();
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Breaking News</h1>
                        <p><?php echo $getBreakingNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Slider</h1>
                        <p><?php echo $getSliderDataRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Category</h1>
                        <p><?php echo $getCategoryDataRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Total News</h1>
                        <p><?php echo $getNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Business News</h1>
                        <p><?php echo $getBusinessNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Fashion News</h1>
                        <p><?php echo $getFashionNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Technology News</h1>
                        <p><?php echo $getTechnologyNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Politics News</h1>
                        <p><?php echo $getPoliticsNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Game News</h1>
                        <p><?php echo $getGameNewsRows;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="cart counterCart">
                    <div class="cart-header ">
                        <h1>Reporter</h1>
                        <p><?php echo $getUserRows;?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('inc/footer.php');?>
