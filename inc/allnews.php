<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>All News</span></h2>
            <ul class="spost_nav">
            <?php
            $getAllNews = $news->getAllNews();
            if($getAllNews){
              while($allNews = $getAllNews->fetch_assoc()){
            ?>
              <li>
                <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $allNews['newsImage'];?>"> </a>
                  <div class="media-body">
                     <a href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="catg_title"> <?php echo $fm->textShorten( $allNews['newsHeading'],60);?></a> 
                     <p href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="catg_title"> <?php echo $fm->textShorten($allNews['newsParagraph'],30);?></p> 
                  </div>
                </div>
              </li>
            <?php } } ?>
            </ul>
          </div>
          <?php include('inc/category.php');?>
          <?php include('inc/sponsor.php');?>
          <?php include('inc/categoryarchive.php');?>
        </aside>
      </div>