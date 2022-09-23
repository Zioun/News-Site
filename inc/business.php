<?php 

  $getsingleBusinessNews = $news->singleBusinessNews();
  $singleBusinessNews = $getsingleBusinessNews->fetch_assoc();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $insertSaveNews = $saveNews->saveNews($_POST,$_FILES);
  }

?>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Business</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <form action="" method="POST" enctype="multipart/form-data">
                <li>
                  <figure class="bsbig_fig"> <a href="viewnews.php?viewNewsId=<?php echo $singleBusinessNews['newsId'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $singleBusinessNews['newsImage'];?>"> <span class="overlay"></span> </a>
                    <figcaption>
                      <a href="viewnews.php?viewNewsId=<?php echo $singleBusinessNews['newsId'];?>">
                      <?php echo $fm->textShorten($singleBusinessNews['newsHeading'],80);?>
                    </a>
                    </figcaption>
                    <p><?php echo $fm->textShorten($singleBusinessNews['newsParagraph'],150);?></p>
                    <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($singleBusinessNews['date'])?></span>
                    <span class=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $singleBusinessNews['adminName']?></span><br><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input hidden name="newsId" type="text" value="<?php echo $singleBusinessNews['newsId']?>">
                      <input hidden name="image" type="text" value="<?php echo $singleBusinessNews['newsImage']?>">
                      <input hidden name="newsHeading" type="text" value="<?php echo $singleBusinessNews['newsHeading']?>">
                      <input hidden name="newsParagraph" type="text" value="<?php echo $singleBusinessNews['newsParagraph']?>">
                      <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                      <?php $login = Session::get('userLogin');
                      if($login == true){ ?>
                      <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                      <?php }else{ ?> 
                          <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                      <?php } ?>
                    </form>
                    <a class="view" href="viewnews.php?viewNewsId=<?php echo $singleBusinessNews['newsId'];?>">Read More</a><br><br>
                  </figure>
                </li>
                </form>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <?php
                  $getMultiBN = $news->multiBusinessNews();
                  if($getMultiBN){
                    while($multiBN = $getMultiBN->fetch_assoc()){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $multiBN['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $multiBN['newsImage'];?>"> </a>
                    <div class="media-body">
                      <a href="viewnews.php?viewNewsId=<?php echo $multiBN['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($multiBN['newsHeading'],60);?></a>
                      <p class="catg_title"><?php echo $fm->textShorten($multiBN['newsParagraph'],30);?></p>
                    </div>
                  </div>
                </li>
                <?php } } ?>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <?php include('inc/fashion.php');?>
            <?php include('inc/technology.php');?>
          </div>
            <?php include('inc/politics.php');?>
            <?php include('inc/game.php');?>
        </div>
      </div>
      <?php include('inc/allnews.php');?>
    </div>
  </section>