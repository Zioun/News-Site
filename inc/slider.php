<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <?php
              $getSliderNews = $slider->getSliderData();
              if($getSliderNews){
                while($result = $getSliderNews->fetch_assoc()){
          ?>
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="admin/<?php echo $result['sliderImage'] ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html"><?php echo $fm->textShorten($result['newsHeading'],50)?></a></h2>
              <p><?php echo $fm->textShorten($result['newsParagraph'],150)?></p>
            </div>
          </div>
          <?php } } ?>
        </div>
      </div>
      <?php include('inc/latestnews.php');?>
    </div>
  </section>