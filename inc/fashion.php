<div class="fashion">
              <div class="single_post_content">
                <h2><span>Fashion</span></h2>
                <?php
                  $getSingleFashionsNews = $news->singleFashionsNews();
                  $singleFashionsNews = $getSingleFashionsNews->fetch_assoc();
                ?>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig">
                      <a href="viewnews.php?viewNewsId=<?php echo $singleFashionsNews['newsId'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $singleFashionsNews['newsImage'];?>"> <span class="overlay"></span> </a>
                      <figcaption>
                        <a href="viewnews.php?viewNewsId=<?php echo $singleFashionsNews['newsId'];?>"><?php echo $fm->textShorten($singleFashionsNews['newsHeading'],85);?></a>
                      </figcaption>
                      <p><?php echo $fm->textShorten($singleFashionsNews['newsParagraph'],130);?></p>
                      <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($singleFashionsNews['date'])?></span>
                      <span class=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $singleFashionsNews['adminName']?></span><br><br>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <input hidden name="newsId" type="text" value="<?php echo $singleFashionsNews['newsId']?>">
                        <input hidden name="image" type="text" value="<?php echo $singleFashionsNews['newsImage']?>">
                        <input hidden name="newsHeading" type="text" value="<?php echo $singleFashionsNews['newsHeading']?>">
                        <input hidden name="newsParagraph" type="text" value="<?php echo $singleFashionsNews['newsParagraph']?>">
                        <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                        <?php $login = Session::get('userLogin');
                        if($login == true){ ?>
                        <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                        <?php }else{ ?> 
                            <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                        <?php } ?>
                      </form>
                      <a class="view" href="viewnews.php?viewNewsId=<?php echo $singleFashionsNews['newsId'];?>">Read More</a>

                    </figure>
                  </li>
                </ul> 
                <ul class="spost_nav">
                <?php
                  $getMultiFashionsNews = $news->multiFashionsNews();
                  if($getMultiFashionsNews){
                    while($multiFashionsNews = $getMultiFashionsNews->fetch_assoc()){
                ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $multiFashionsNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $multiFashionsNews['newsImage'];?>"> </a>
                      <div class="media-body">
                        <a href="viewnews.php?viewNewsId=<?php echo $multiFashionsNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($multiFashionsNews['newsHeading'],60);?></a>
                        <p class="catg_title"><?php echo $fm->textShorten($multiFashionsNews['newsParagraph'],30);?></p>
                    </div>
                    </div>
                  </li>
                <?php } } ?>
                </ul>
              </div>
            </div>