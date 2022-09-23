<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php

  if(!isset($_GET['viewNewsId']) || $_GET['viewNewsId'] == null){
    echo "<script>window.location='404.php'</script>";
  }else{
    $id = $_GET['viewNewsId'];
    $detailsNews = $news->detailsNews($id);
    $getDetails = $detailsNews->fetch_assoc();
  }
                  
?>

      <section id="contentSection">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
              <div class="single_page">
                <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="category.php?category=<?php echo $getDetails['category'];?>"><?php echo $getDetails['categoryName']?></a></li>
                </ol>
                <h1 style="font-size:20px;"><?php echo $getDetails['newsHeading']?></h1>
                <div class="post_commentbox">
                  <span href=""><i class="fa fa-user"></i><?php echo $getDetails['adminName'];?></span> <span><i class="fa fa-calendar"></i><?php echo $fm->getDateString($getDetails['date'])?></span> <a href="category.php?category=<?php echo $getDetails['category'];?>"><i class="fa fa-tags"></i><?php echo $getDetails['categoryName'];?></a>
                </div>
                <div class="single_page_content"> <img class="img-center" src="./admin/<?php echo $getDetails['newsImage'];?>" alt="">
                <blockquote> <?php echo $getDetails['newsParagraph']?> </blockquote>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2 style="margin-bottom:30px;"><span>Related Post</span></h2>
            <ul class="spost_nav">
            <?php
                $catId = $getDetails['category'];
                $getRelatednews = $news->getRelatednews($catId);
                if($getRelatednews){
                    while($relatedNews = $getRelatednews->fetch_assoc()){

            ?>
              <li>
                <div class="media wow fadeInDown">
                    <a href="viewnews.php?viewNewsId=<?php echo $relatedNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $relatedNews['newsImage'];?>"> </a>
                <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $relatedNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($relatedNews['newsHeading'],50);?></a>
                    <p href="viewnews.php?viewNewsId=<?php echo $relatedNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($relatedNews['newsParagraph'],50);?></p>
                </div>
                </div>
              </li>
            <?php } }?>
            </ul>
          </div>
        </aside>
      </div>
        </div>
      </section>
      </div>
    </div>
  </section>
<?php include('inc/footer.php');?>