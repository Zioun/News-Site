<?php include('inc/header.php');?>
<?php include('inc/breakingnews.php');?>

<?php
  $login = Session::get('userLogin');
  if($login == false){
    echo "<script>window.location='index.php'</script>";
  }
  $login = Session::get('userLogin');
    if($login == true){

      $getSaveData = $saveNews->getSaveData();
      $getSaveCount = $saveNews->getSaveCount();
  
    if(isset($_GET['delSinData'])){
      $delSinData = $_GET['delSinData'];
      $deleteSingleData = $saveNews->deleteSingleData($delSinData);
    }

    if(isset($_GET['delAllData'])){
      $deleteAllData = $saveNews->deleteAllData();
    }  
  }  
  

?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
          <div class="contact_area">
            <h2>Save News</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Heading</th>
                      <th scope="col">Paragraph</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                  if($getSaveCount == 0){
                ?>
                <h3 class="error_alert">You have no save news!</h3><br><br>
                <?php }elseif($getSaveCount > 1){ ?>
                  <a onclick="return confirm('Do You Want To Delete All Saved Data!')" href="?delAllData" type="submit" class="btn btn-danger del_btn">All Delete</a>
                <?php } ?>
                <?php 
                  if($getSaveCount > 0){
                ?>
                <h4 calss="success_alert">
                  <?php
                    if(isset($deleteSingleData)){
                      echo "News Delete Successfully!";
                    }
                  ?>
                </h4>
                <?php

                  
                  if($getSaveData){
                    while($saveData = $getSaveData->fetch_assoc()){
                  

                ?>
                  
                    <tr>
                      <td>
                        <img class="save_news_img" src="admin/<?php echo $saveData['newsImage'];?>">
                      </td>
                      <td>
                        <?php echo $fm->textShorten($saveData['newsHeading'],150);?>
                      </td>
                      <td>
                        <?php echo $fm->textShorten($saveData['newsParagraph'],150);?>
                      </td>
                      <td>
                        <?php echo $fm->getDateString($saveData['date']);?>
                      </td>
                      <td>
                        <a href="viewnews.php?viewNewsId=<?php echo $saveData['newsId'];?>" type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a href="?delSinData=<?php echo $saveData['saveId']; ?>" type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    
                  <?php } } ?>
                    
                </tbody>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include('inc/footer.php');?>