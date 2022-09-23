<?php
    spl_autoload_register(function($classs){
        include_once ("classes/".$class.".php");
    });
?>
<?php
    include('../lib/session.php');
    Session::checkSession();
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }
?>
<?php
    include('../helpers/format.php');
    $fm = new Format();
?>
<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="assets/images/logo.svg" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Main Menu</li>
            
            
                <?php
                    $path = $_SERVER['SCRIPT_FILENAME'];
                    $currentpage = basename($path, '.php');
                ?>
                <li class="sidebar-item <?php if($currentpage == 'dashboard'){echo 'active';}?>">
                    <a href="dashboard.php" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                    
                </li>

            
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="airplay" width="20"></i> 
                        <span>Breaking News</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'uploadbknews' || $currentpage == 'breakingnews'){echo 'active';}?>">
                        <li style="background:<?php if($currentpage == 'uploadbknews'){echo '#E8F3FF';}?>" >
                            <a href="uploadbknews.php">Upload News</a>
                        </li>

                        <li style="background:<?php if($currentpage == 'breakingnews'){echo '#E8F3FF';}?>">
                            <a href="breakingnews.php">News List</a>
                        </li>
                        
                    </ul>
                    
                </li>

                <?php
                $userLevel = Session::get('levels');
                if($userLevel == 1){ ?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="square" width="20"></i>
                        <span>Slider</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'sliderupload' || $currentpage == 'sliderlist'){echo 'active';}?>">
                        
                        <li style="background:<?php if($currentpage == 'sliderupload'){echo '#E8F3FF';}?>">
                            <a href="sliderupload.php">Upload Slider</a>
                        </li>
                        
                        <li style="background:<?php if($currentpage == 'sliderlist'){echo '#E8F3FF';}?>">
                            <a href="sliderlist.php">Slider List</a>
                        </li>
                        
                    </ul>
    
                </li>
                <?php } ?>
                <?php
                    $userLevel = Session::get('levels');
                        if($userLevel == 1){ ?>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i> 
                                <span>Advertisement</span>
                            </a>
                    
                            <ul class="submenu <?php if($currentpage == 'banner' || $currentpage == 'squarebanner'){echo 'active';}?>">
                            
                                <li style="background:<?php if($currentpage == 'banner'){echo '#E8F3FF';}?>">
                                    <a href="banner.php">Banner</a>
                                </li>
                            
                                <li style="background:<?php if($currentpage == 'squarebanner'){echo '#E8F3FF';}?>">
                                    <a href="squarebanner.php">Squeare Banner</a>
                                </li>
                            </ul>
                        </li>
                <?php } ?>

                <?php
                $userLevel = Session::get('levels');
                if($userLevel == 1){ ?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="filter" width="20"></i> 
                        <span>Category</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'uploadcategory' || $currentpage == 'listcategory'){echo 'active';}?>">
                        
                        <li style="background:<?php if($currentpage == 'uploadcategory'){echo '#E8F3FF';}?>">
                            <a href="uploadcategory.php">Upload Category</a>
                        </li>
                        
                        <li style="background:<?php if($currentpage == 'listcategory'){echo '#E8F3FF';}?>">
                            <a href="listcategory.php">Category List</a>
                        </li>
                        
                    </ul>
                    
                </li>
                <?php } ?>

            
            
            
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="tv" width="20"></i> 
                        <span>News</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'uploadnews' || $currentpage == 'listnews' || $currentpage == 'listbusiness' || $currentpage == 'listfashion' || $currentpage == 'listtechnology' || $currentpage == 'listpolitics' || $currentpage == 'listgame'){echo 'active';}?>">
                        
                        <li style="background:<?php if($currentpage == 'uploadnews'){echo '#E8F3FF';}?>">
                            <a href="uploadnews.php">Upload News</a>
                        </li>
                        
                        <li style="background:<?php if($currentpage == 'listnews'){echo '#E8F3FF';}?>">
                            <a href="listnews.php">All News List </a>
                        </li>

                        <li style="background:<?php if($currentpage == 'listbusiness'){echo '#E8F3FF';}?>">
                            <a href="listbusiness.php">Business List </a>
                        </li>

                        <li style="background:<?php if($currentpage == 'listfashion'){echo '#E8F3FF';}?>">
                            <a href="listfashion.php">Fashion List </a>
                        </li>

                        <li style="background:<?php if($currentpage == 'listtechnology'){echo '#E8F3FF';}?>">
                            <a href="listtechnology.php">Technology List </a>
                        </li>

                        <li style="background:<?php if($currentpage == 'listpolitics'){echo '#E8F3FF';}?>">
                            <a href="listpolitics.php">politics List </a>
                        </li>

                        <li style="background:<?php if($currentpage == 'listgame'){echo '#E8F3FF';}?>">
                            <a href="listgame.php">Game List </a>
                        </li>
                        
                    </ul>
                    
                </li>
                <?php
                    $userLevel = Session::get('levels');
                    if($userLevel == 1){ ?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="mail" width="20"></i> 
                        <span>Mail</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'message' || $currentpage == 'listuser'){echo 'active';}?>">
                        <li style="background:<?php if($currentpage == 'message'){echo '#E8F3FF';}?>"><?php
                            $userLevel = Session::get('levels');
                            if($userLevel == 1){ ?>
                            <a href="message.php">Message List</a>
                            <?php } ?>
                        </li>
                    </ul>  
                </li>
                <?php } ?> 
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>User</span>
                    </a>
                    
                    <ul class="submenu <?php if($currentpage == 'uploaduser' || $currentpage == 'listuser'){echo 'active';}?>">
                        <?php
                            $userLevel = Session::get('levels');
                            if($userLevel == 1){ ?>
                             <li style="background:<?php if($currentpage == 'uploaduser'){echo '#E8F3FF';}?>">
                                <a href="uploaduser.php">Add New User</a>
                             </li>
                        <?php } ?>
                       
                        
                        <li style="background:<?php if($currentpage == 'listuser'){echo '#E8F3FF';}?>">
                            <a href="listuser.php">User List</a>
                        </li>
                        
                    </ul>  
                </li> 
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>