<?php
  
  include_once('lib/session.php');
  include_once('helpers/format.php');
  include_once('classes/banner.php');
  include_once('classes/breakingnews.php');
  include_once('classes/slider.php');
  include_once('classes/category.php');
  include_once('classes/news.php');
  include_once('classes/saveNews.php');
  include_once('classes/userregistration.php');
  include_once('classes/userauthentication.php');
  include_once('classes/contact.php');

?>
<?php

  $session = new Session();
  $fm = new Format();
  $banner = new Banner();
  $breaking = new Breaking();
  $slider = new Slider();
  $category = new Category();
  $news = new News();
  $saveNews = new saveNews();
  $userRegistration = new Userregistration();
  $userAuthentication = new Userauthentication();
  $contact = new Contact();

?>
<!DOCTYPE html>
<html>
<head>
<title>NewsFeed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
            <?php
            $login = Session::get('userLogin');
            if($login == true){?>
              <li><a href="savenews.php">Save News <span class="save_news_alert">
              <?php
              
                $getSaveCount = $saveNews->getSaveCount();
                echo $getSaveCount;

              ?>
              </span></a></li>
            <?php } ?>
            <?php
				      if(isset($_GET['cid'])){
					    $deletLogin = $ct->delCustomerCart();
					    Session::destroy();
				      }
			      ?>

            <?php
              if(isset($_GET['cmrId'])){
                Session::destroy();
                header("Location:index.php");
              }
            ?>

            <?php
              $login = Session::get('userLogin');
              if($login == true){?>
                <li><a href="?cmrId=<?php echo Session::get("userId");?>">Logout</a></li>
            <?php }else{ ?>
              <li class="active"><a href="login.php">Login</a></li>
            <?php } ?>

            </ul>
          </div>
          <div class="header_top_right">
            <?php
              $getUserProfile = $userRegistration->showUserProfileData();
              if($getUserProfile){
                $userProfile = $getUserProfile->fetch_assoc();
                Session::set('userId',$userProfile['userId']);
              }
            ?>
            <?php
            $login = Session::get('userLogin');
            if($login == true){?>
            <img class="profile_img" src="<?php echo $userProfile['userImage'];?>" alt="Prifile">
            <a href="profile.php" class="profile_name">
            <p><?php echo $userProfile['userFirstName'].' '.$userProfile['userLastName'];?></p>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <?php
          $getBannerImg = $banner->getBannerData();
          $getBanner = $getBannerImg->fetch_assoc();
        ?>
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="admin/<?php echo $getBanner['urlLink']?>"><img src="admin/<?php echo $getBanner['bannerImage']?>" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <?php 
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currentpage = basename($path, '.php');
          ?>
          <li class="<?php if($currentpage == 'index'){echo 'active';}?>"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li class="<?php if($currentpage == 'news'){echo 'active';}?>"><a href="news.php">News</a></li>
          <li class="<?php if($currentpage == 'business'){echo 'active';}?>"><a href="business.php">Business</a></li>
          <li class="<?php if($currentpage == 'fashion'){echo 'active';}?>"><a href="fashion.php">Fashion</a></li>
          <li class="<?php if($currentpage == 'technology'){echo 'active';}?>"><a href="technology.php">Technology</a></li>
          <li class="<?php if($currentpage == 'politics'){echo 'active';}?>"><a href="politics.php">Politics</a></li>
          <li class="<?php if($currentpage == 'game'){echo 'active';}?>"><a href="game.php">Game</a></li>
          <li class="<?php if($currentpage == 'contact'){echo 'active';}?>"><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
    </nav>
  </section>