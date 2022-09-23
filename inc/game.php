<div class="single_post_content">
            <h2><span>Games</span></h2>
            <?php
              $getSingleGameNews = $news->singleGameNews();
              $singleGameNews = $getSingleGameNews->fetch_assoc();
            ?>
            <div class="single_post_content_left">
              <ul class="business_catgnav"> 
                <li>
                  <figure class="bsbig_fig"> <a href="viewnews.php?viewNewsId=<?php echo $singleGameNews['newsId'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $singleGameNews['newsImage'];?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="viewnews.php?viewNewsId=<?php echo $singleGameNews['newsId'];?>"><?php echo $fm->textShorten($singleGameNews['newsHeading'],90);?> </figcaption>
                    <p><?php echo $fm->textShorten($singleGameNews['newsParagraph'],150);?></p>
                    <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($singleGameNews['date'])?></span>
                    <span class=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $singleGameNews['adminName']?></span><br><br>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input hidden name="newsId" type="text" value="<?php echo $singleGameNews['newsId']?>">
                      <input hidden name="image" type="text" value="<?php echo $singleGameNews['newsImage']?>">
                      <input hidden name="newsHeading" type="text" value="<?php echo $singleGameNews['newsHeading']?>">
                      <input hidden name="newsParagraph" type="text" value="<?php echo $singleGameNews['newsParagraph']?>">
                      <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                      <?php $login = Session::get('userLogin');
                      if($login == true){ ?>
                      <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                      <?php }else{ ?> 
                          <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                      <?php } ?>
                    </form>
                    <a class="view" href="viewnews.php?viewNewsId=<?php echo $singleGameNews['newsId'];?>">Read More</a>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
            <ul class="spost_nav">
                <?php
                  $getMultiGameNews = $news->multiGameNews();
                  if($getMultiGameNews){
                    while($multiGameNews = $getMultiGameNews->fetch_assoc()){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $multiGameNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $multiGameNews['newsImage'];?>"> </a>
                    <div class="media-body">
                      <a href="viewnews.php?viewNewsId=<?php echo $multiGameNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($multiGameNews['newsHeading'],60);?></a>
                      <p class="catg_title"><?php echo $fm->textShorten($multiGameNews['newsParagraph'],35);?></p>
                    </div>
                  </div>
                </li>
              <?php } } ?>
            </ul>
            </div>
          </div>