<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php

    if(isset($_GET['search'])){
        $search = $_GET['search'];
        Session::set('search', $search);
    }

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="searchbar">
                <form action="search.php" method="GET">
                    <input type="text" class="searchInput" name="search">
                    <input type="submit" class="searchButton" name="submit">
                </form>
            </div>
        </div>
        <?php
        
        $getSearch = $news->getSearch();
        if($getSearch){
            while($result = $getSearch->fetch_assoc()){
        ?>

        
        
        <div class="col-md-4">
            <div class="cart">
                <img src="admin/<?php echo $result['newsImage']?>" alt="">
                <h1><?php echo $fm->textShorten($result['newsHeading'],70)?></h1>
                <p><?php echo $fm->textShorten($result['newsParagraph'],162)?></p>
                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($result['date'])?></span>
                <span class="date"><i class="fa fa-tags" aria-hidden="true"></i> <?php echo $result['categoryName']?></span>
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
        <?php } }else{ ?>
            <h1 style="color:red;">Search Not Found!</h1><br>
        <?php } ?>
    </div>
</div>

<?php include('inc/footer.php');?>