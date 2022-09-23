
</div>
  <div class="single_sidebar wow fadeInDown">
    <h2><span>HEADLINE</span></h2>
    <ul>
    <?php
      $getAllNewsHeading = $news->getAllNewsHeading();
      if($getAllNewsHeading){
        while($allNewsHeading = $getAllNewsHeading->fetch_assoc()){
      ?>
      <li>
        <a class="news_heading" href="viewnews.php?viewNewsId=<?php echo $allNewsHeading['newsId'];?>">
          <span><i class="fa fa-caret-right" aria-hidden="true"></i></span>
          <?php echo $fm->textShorten($allNewsHeading['newsHeading'],40);?>
        </a>
      </li>
    <?php } } ?>
  </div>