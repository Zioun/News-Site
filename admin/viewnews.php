<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>  
<?php
    if(isset($_GET['viewNews'])){
        $id = $_GET['viewNews'];
        $showNewsData = $news->showNewsData($id);
        $showNews = $showNewsData->fetch_assoc();
    }
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Single News</h3>
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
                        <img class="card-img-top img-fluid" src="./<?php echo $showNews['newsImage'];?>" alt="Card image cap" />
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $showNews['newsHeading'];?></h4>
                            <p class="card-text">
                                <?php echo $showNews['newsParagraph'];?>
                            </p>
                            <span class="card-text">
                                Date - <?php echo $fm->getDateString($showNews['date']);?> 
                            </span>
                            <span class="card-text left_margin">
                                Category - <?php echo $showNews['categoryName'];?>
                            </span>
                            <span class="card-text left_margin">
                                Reporter - <?php echo $showNews['adminName'];?>
                            </span><br><br>
                            <a href="listnews.php" class="btn btn-primary block">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('inc/footer.php');?>
