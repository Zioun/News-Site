<div class="single_sidebar wow fadeInDown">
  <?php
    $getSponsor = $banner->getSquareBannerData();
    $sponsor = $getSponsor->fetch_assoc();
  ?>
  <h2><span>Sponsor</span></h2>
    <a class="sideAdd" href="#">
      <img src="admin/<?php echo $sponsor['bannerImage'];?>" alt="">
    </a>
</div>
<div class="single_sidebar wow fadeInDown">