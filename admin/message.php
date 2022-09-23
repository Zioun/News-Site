<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?>  
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }else{
        if(isset($_GET['deletemessage'])){
            $id = $_GET['deletemessage'];
            $deletemessage = $contact->contactMsgId($id);
        }
         
    }
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Message</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Message <br><br>

                <?php
                    if(isset($deletemessage)){
                        echo $deletemessage;
                    }
                ?>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>User</th>
                            <th style="width:20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $getContactMsg = $contact->getContactMsg();
                        if($getContactMsg){
                            while($contactMsg = $getContactMsg->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $contactMsg['conName']?></td>
                            <td><?php echo $contactMsg['conEmail']?></td>
                            <td><?php echo $fm->textShorten($contactMsg['conMessage'],20)?></td>
                            <td><?php echo $fm->getDateString($contactMsg['conDate'],20)?></td>
                            <td>
                                <?php
                                    if($contactMsg['checkMsg'] == 1){
                                ?>
                                <span class="badge bg-success"> <i data-feather="user-check" width="20"></i></span>
                                <?php }else{ ?>
                                    <span class="badge bg-danger"> <i data-feather="user-x" width="20"></i></span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="viewmessage.php?viewmessage=<?php echo $contactMsg['conId'];?>" class="btn btn-success">
                                    <i data-feather="search" width="20"></i>
                                </a>
                                <a onclick="return confirm('Do you want to delete Message.')" href="?deletemessage=<?php echo $contactMsg['conId'];?>" class="btn btn-danger"> 
                                    <i data-feather="x" width="20"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<?php include('inc/footer.php');?>
