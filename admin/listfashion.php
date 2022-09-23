<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
<?php

    if(isset($_GET['deleteNews'])){
        $id = $_GET['deleteNews'];
        $deleteNews = $news->deleteNews($id);
    }
    
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Fashion News</h3>
                <p class="text-subtitle text-muted">Fashion News Data Table</p>
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
                    if(isset($deleteNews)){
                        echo $deleteNews;
                    }
                ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Paragraph</th>
                            <th>Reporter</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $getNewsFashion = $news->getNewsFashionAdmin();
                            
                            if($getNewsFashion){
                                while($getNews = $getNewsFashion->fetch_assoc()){     

                        ?>
                            <tr>
                                <td>
                                    <img height="70px;" width="100px;" src="./<?php echo $getNews['newsImage'];?>" alt="">
                                </td>
                                <td>
                                    <?php echo $fm->textShorten($getNews['newsHeading'],50);?>
                                </td>
                                <td>
                                    <?php echo $fm->textShorten($getNews['newsParagraph'],50);?>
                                </td>
                                <td>
                                    <span class="reporter_name"><?php echo $getNews['adminName'];?></span>
                                </td>
                                <td>
                                    <?php echo $fm->getDateString($getNews['date']);?>
                                </td>
                                <td>
                                <a href="viewnews.php?viewNews=<?php echo $getNews['newsId'];?>" type="submit" class="btn btn-success btn-sm mr-1 mb-1"><i data-feather="search" width="20"></i></a>
                                <?php
                                        $userLevel = Session::get('levels');
                                        $userName = Session::get('adminName');
                                        if($userLevel == 1 || $userName ==  $getNews['adminName']){
                                    ?>
                                    <a  href="updatenews.php?updateNews=<?php echo $getNews['newsId'];?>" type="submit" class="btn btn-primary btn-sm mr-1 mb-1"><i data-feather="edit-3" width="20"></i></a>

                                    <a href="?deleteNews=<?php echo $getNews['newsId'];?>" type="submit" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Do you want to delete News.')"><i data-feather="x" width="20"></i></a>
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
