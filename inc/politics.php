<div class="single_post_content">
            <h2><span>Politics</span></h2>
            <?php
              $getSinglePoliticsNews = $news->singlePoliticsNews();
              $singlePoliticsNews = $getSinglePoliticsNews->fetch_assoc();
            ?>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig"> <a href="viewnews.php?viewNewsId=<?php echo $singlePoliticsNews['newsId'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $singlePoliticsNews['newsImage'];?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="viewnews.php?viewNewsId=<?php echo $singlePoliticsNews['newsId'];?>"><?php echo $fm->textShorten($singlePoliticsNews['newsHeading'],80);?> </figcaption>
                    <p><?php echo $fm->textShorten($singlePoliticsNews['newsParagraph'],150);?></p>
                    <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($singlePoliticsNews['date'])?></span>
                    <span class=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $singlePoliticsNews['adminName']?></span><br><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input hidden name="newsId" type="text" value="<?php echo $singlePoliticsNews['newsId']?>">
                      <input hidden name="image" type="text" value="<?php echo $singlePoliticsNews['newsImage']?>">
                      <input hidden name="newsHeading" type="text" value="<?php echo $singlePoliticsNews['newsHeading']?>">
                      <input hidden name="newsParagraph" type="text" value="<?php echo $singlePoliticsNews['newsParagraph']?>">
                      <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                      <?php $login = Session::get('userLogin');
                      if($login == true){ ?>
                      <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                      <?php }else{ ?> 
                          <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                      <?php } ?>
                    </form>
                    <a class="view" href="viewnews.php?viewNewsId=<?php echo $singlePoliticsNews['newsId'];?>">Read More</a>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
            <ul class="spost_nav">
                <?php
                  $getMultiPoliticsNews = $news->multiPoliticsNews();
                  if($getMultiPoliticsNews){
                    while($multiPoliticsNews = $getMultiPoliticsNews->fetch_assoc()){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $multiPoliticsNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $multiPoliticsNews['newsImage'];?>"> </a>
                    <div class="media-body">
                      <a href="viewnews.php?viewNewsId=<?php echo $multiPoliticsNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($multiPoliticsNews['newsHeading'],60);?></a>
                      <p class="catg_title"><?php echo $fm->textShorten($multiPoliticsNews['newsParagraph'],30);?></p>
                    </div>
                  </div>
                </li>
              <?php } } ?>
            </ul>
          </div>
        </div>