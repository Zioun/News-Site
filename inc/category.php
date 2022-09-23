<div class="single_sidebar">
            <div class="single_sidebar">
                <h2><span>Category</span></h2>
            </div>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                <?php
                  $getCategory = $category->getCategoryData();
                  if($getCategory){
                  while($result = $getCategory->fetch_assoc()){
                ?>
                  <li class="cat-item"><a href="category.php?category=<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></a></li>
                <?php } } ?>
                </ul>
              </div>
            </div>
          </div>