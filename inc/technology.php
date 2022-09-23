<div class="technology">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <?php
                  $getSingleTechnologyNews = $news->singleTechnologyNews();
                  $singleTechnologyNews = $getSingleTechnologyNews->fetch_assoc();
                ?>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig">
                      <a href="viewnews.php?viewNewsId=<?php echo $singleTechnologyNews['newsId'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $singleTechnologyNews['newsImage'];?>"> <span class="overlay"></span> </a>
                      <figcaption>
                        <a href="viewnews.php?viewNewsId=<?php echo $singleTechnologyNews['newsId'];?>"><?php echo $fm->textShorten($singleTechnologyNews['newsHeading'],87);?></a>
                      </figcaption>
                      <p><?php echo $fm->textShorten($singleTechnologyNews['newsParagraph'],130);?></p>
                      <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fm->getDateString($singleTechnologyNews['date'])?></span>
                      <span class=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $singleTechnologyNews['adminName']?></span><br><br>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <input hidden name="newsId" type="text" value="<?php echo $singleTechnologyNews['newsId']?>">
                        <input hidden name="image" type="text" value="<?php echo $singleTechnologyNews['newsImage']?>">
                        <input hidden name="newsHeading" type="text" value="<?php echo $singleTechnologyNews['newsHeading']?>">
                        <input hidden name="newsParagraph" type="text" value="<?php echo $singleTechnologyNews['newsParagraph']?>">
                        <input hidden name="userId" type="text" value="<?php echo Session::get('userId');?>">
                        <?php $login = Session::get('userLogin');
                        if($login == true){ ?>
                        <input  class="savebtn" type="submit" name="submit" value="Save News"><br>
                        <?php }else{ ?> 
                            <a href="login.php" class="savebtn" type="submit" name="submit" value="Save News">Save News</a>
                        <?php } ?>
                      </form>
                      <a class="view" href="viewnews.php?viewNewsId=<?php echo $singleTechnologyNews['newsId'];?>">Read More</a>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                <?php
                  $getMultiTechnologyNews = $news->multiTechnologyNews();
                  if($getMultiTechnologyNews){
                    while($multiTechnologyNews = $getMultiTechnologyNews->fetch_assoc()){
                ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $multiTechnologyNews['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $multiTechnologyNews['newsImage'];?>"> </a>
                      <div class="media-body">
                        <a href="viewnews.php?viewNewsId=<?php echo $multiTechnologyNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($multiTechnologyNews['newsHeading'],60);?></a>
                        <p class="catg_title"><?php echo $fm->textShorten($multiTechnologyNews['newsParagraph'],30);?></p>
                    </div>
                    </div>
                  </li>
                <?php } } ?>
                </ul>
              </div>
            </div>