<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>  
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }else{
        if(isset($_GET['viewmessage'])){
            $id = $_GET['viewmessage'];
            $getContactMsgId = $contact->getContactMsgId($id);
            $showMsg = $getContactMsgId->fetch_assoc();
        }
        
    }
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Message</h3>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Card</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section id="content-types">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                            <div class="msg_view">
                                <h4 class="card-title"><?php echo $showMsg['conName'];?></h4>
                                <p class="card-text">
                                    <?php echo $showMsg['conEmail'];?>
                                </p>
                                <p class="card-text">
                                    <?php echo $showMsg['conMessage'];?> 
                                </p>
                                <p><?php echo $fm->getDateString($showMsg['conDate'],20)?></p>
                                <a class="btn btn-light" href="message.php">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('inc/footer.php');?>
