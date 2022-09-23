<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Breaking News</span>
          <ul id="ticker01" class="news_sticker">
            <?php
              $breakingNews = $breaking->getBreakingNews();
              if($breakingNews){
                while($result = $breakingNews->fetch_assoc()){
            ?>
            <li><a href=""><img src="admin/<?php echo $result['titleImage'];?>" alt=""><?php echo $result['newsHeading'];?></a></li>
            <?php } } ?>
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>