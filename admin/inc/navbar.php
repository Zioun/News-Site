<?php

    include('../classes/profile.php');
    include('../classes/banner.php');
    include('../classes/breakingnews.php');
    include('../classes/slider.php');
    include('../classes/category.php');
    include('../classes/news.php');
    include('../classes/registration.php');
    include('../classes/user.php');
    include('../classes/contact.php');

    $profile = new Profile();
    $banner = new Banner();
    $breaking = new Breaking();
    $slider = new Slider();
    $category = new Category();
    $news = new News();
    $register = new Registration();
    $user = new User();
    $contact = new Contact();
    
?>
<div id="main">
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                <li class="dropdown nav-icon">
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                        <h6 class='py-2 px-4'>Notifications</h6>
                        <ul class="list-group rounded-none">
                            <li class="list-group-item border-0 align-items-start">
                                <div class="avatar bg-success mr-3">
                                    <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                </div>
                                <div>
                                    <h6 class='text-bold'>New Order</h6>
                                    <p class='text-xs'>
                                        An order made by Ahmad Saugi for product Samsung Galaxy S69
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                    $getProData = $profile->getProData();
                    $result = $getProData->fetch_assoc();
                ?>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="avatar mr-1">
                            <img class="profile_img_nav" href = "#" src="./<?php echo $result['adminImage']?>" alt="" srcset="">
                        </div>
                        <div class="d-none d-md-block d-lg-inline-block">
                            <?php echo $result['adminName']?> <?php echo $result['adminLastName']?>
                            <span class="user_category">
                                <?php
                                    if($result['levels']==1){
                                        echo '( Admin )';
                                    }else{
                                        echo '( Reporter )';
                                    }
                                ?>
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.php"><i data-feather="user"></i> Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?action=logout"><i data-feather="log-out"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>