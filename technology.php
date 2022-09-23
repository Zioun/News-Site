<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $insertSaveNews = $saveNews->saveNews($_POST,$_FILES);
    } 
    $per_page = 6;
    Session::set('perPage',$per_page);
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start_form = ($page-1) * $per_page;
    Session::set('startForm',$start_form);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="heading">Technology News</h1> 
        </div>
        <div class="">
        <h4 class="insert_alert">
            <?php
                if(isset($insertSaveNews)){
                    echo $insertSaveNews;
                }
            ?>
        </h4>
        </div>
        <?php
        
        $getTechnology = $news->getNewsTechnology();
        if($getTechnology){
            while($result = $getTechnology->fetch_assoc()){
        ?>
        <div class="col-md-4">
            <div class="cart">
                <img src="admin/<?php echo $result['newsImage']?>" alt="">
                <h1><?php echo $fm->textShorten($result['newsHeading'],70)?></h1>
                <p><?php echo $fm->textShorten($result['newsParagraph'],162)?></p>
                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($result['date'])?></span>
                <span class="date"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result['adminName']?></span>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input hidden name="newsId" type="text" value="<?php echo $result['newsId']?>">
                    <input hidden name="image" type="text" value="<?php echo $result['newsImage']?>">
                    <input hidden name="newsHeading" type="text" value="<?php echo $result['newsHeading']?>">
                    <input hidden name="newsParagraph" type="text" value="<?php echo $result['newsParagraph']?>">
                    <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                    <?php $login = Session::get('userLogin');
                    if($login == true){ ?>
                    <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                    <?php }else{ ?> 
                        <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                    <?php } ?>
                </form>
                <div class="readmoreBTN">
                <a class="readmoreBTN" href="viewnews.php?viewNewsId=<?php echo $result['newsId'];?>">Read More</a>
                </div>
            </div>
        </div>
        <?php } } ?>
        <div class="col-md-12">
        <!-- pagination -->
        <div class="pagination">
        <?php
                $pagenation = $news->paginationForTechnology();
                $totalPage = Session::get('getPage');

                echo "<span><a class='firstPage' href='?page=1'>".'<i class="fa fa-angle-left" aria-hidden="true"></i>'."</a>";
                
                    for($i=1; $i <= $totalPage; $i++){
                        echo "<a class='singlePage' href='?page=".$i."'>".$i."</a>";
                    }

                echo "<a class='lastPage' href='?page=$totalPage'>".'<i class="fa fa-angle-right" aria-hidden="true"></i>'."</a></span>"
        ?>
        </div>
        <!-- end pagination -->
        </div>
    </div>
</div>

<?php include('inc/footer.php');?>