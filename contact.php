<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>
<?php

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $insertContact = $contact->contactMsg($_POST);
  } 

?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2><br>
            <?php
              if(isset($insertContact)){
                echo $insertContact;
              }
            ?>
            <form action=" " method="POST" class="contact_form">
              <?php
                $login = Session::get('userLogin');
                if($login == true){ ?>
              <input hidden name="checkMsg" type="text" value="1">
              <?php }else{ ?>
                <input hidden name="checkMsg" type="text" value="0">
              <?php } ?>
              <input name="conName" class="form-control" type="text" placeholder="Name*">
              <input name="conEmail" class="form-control" type="email" placeholder="Email*">
              <textarea name="conMessage" class="form-control" cols="30" rows="10" placeholder="Message*"></textarea>
              <input type="submit" name="submit" value="Send Message">
            </form>
          </div>
        </div>
      </div>
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
                <div class="media wow fadeInDown"> <a href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="media-left"> <img alt="" src="./admin/<?php echo $allNews['newsImage']?>"> </a>
                  <div class="media-body">
                    <a href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($allNews['newsHeading'],70);?></a>
                    <p href="viewnews.php?viewNewsId=<?php echo $allNews['newsId'];?>" class="catg_title"><?php echo $fm->textShorten($allNews['newsParagraph'],30);?></p>
                  </div>
                </div>
              </li>
            <?php } } ?>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
<?php include('inc/footer.php');?>