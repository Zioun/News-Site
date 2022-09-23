<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest News</span></h2>
          <?php
            $getLatestBusiness = $news->latestBusiness();
            $latestBusiness = $getLatestBusiness->fetch_assoc();
          ?>
          <?php
            $getLatestFashion = $news->latestFashion();
            $latestFashion = $getLatestFashion->fetch_assoc();
          ?>
          <?php
            $getLatestTechnology = $news->latestTechnology();
            $latestTechnology = $getLatestTechnology->fetch_assoc();
          ?>
          <?php
            $getLatestPolitics = $news->latestPolitics();
            $latestPolitics = $getLatestPolitics->fetch_assoc();
          ?>
          <?php
            $getLatestGame = $news->latestGame();
            $latestGame = $getLatestGame->fetch_assoc();
          ?>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                <div class="media"> <a href="viewnews.php?viewNewsId=<?php echo $latestBusiness['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $latestBusiness['newsImage'];?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $latestBusiness['newsId'];?>" class="catg_title latest_heading"> <?php echo $fm->textShorten($latestBusiness['newsHeading'],50);?></a>
                    <p><?php echo $fm->textShorten($latestBusiness['newsParagraph'],32);?></p>
                </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="viewnews.php?viewNewsId=<?php echo $latestFashion['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $latestFashion['newsImage'];?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $latestFashion['newsId'];?>" class="catg_title latest_heading"> <?php echo $fm->textShorten($latestFashion['newsHeading'],50);?></a>
                    <p><?php echo $fm->textShorten($latestFashion['newsParagraph'],32);?></p>
                </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="viewnews.php?viewNewsId=<?php echo $latestTechnology['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $latestTechnology['newsImage'];?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $latestTechnology['newsId'];?>" class="catg_title latest_heading"> <?php echo $fm->textShorten($latestTechnology['newsHeading'],50);?></a>
                    <p><?php echo $fm->textShorten($latestTechnology['newsParagraph'],32);?></p>
                </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="viewnews.php?viewNewsId=<?php echo $latestPolitics['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $latestPolitics['newsImage'];?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $latestPolitics['newsId'];?>" class="catg_title latest_heading"> <?php echo $fm->textShorten($latestPolitics['newsHeading'],50);?></a>
                    <p><?php echo $fm->textShorten($latestPolitics['newsParagraph'],32);?></p>
                </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="viewnews.php?viewNewsId=<?php echo $latestGame['newsId'];?>" class="media-left"> <img alt="" src="admin/<?php echo $latestGame['newsImage'];?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $latestGame['newsId'];?>" class="catg_title latest_heading"> <?php echo $fm->textShorten($latestGame['newsHeading'],50);?></a>
                    <p><?php echo $fm->textShorten($latestGame['newsParagraph'],32);?></p>
                </div>
                </div>
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>