<?php include('inc/sidenavbar.php');?>
<?php include('inc/navbar.php');?> 
<?php
    $userLevel = Session::get('levels');
    if(!$userLevel == 1){  
        echo "<script>window.location='dashboard.php'</script>" ;   
    }

    $userLevel = Session::get('levels');
    if($userLevel == 1){  
        if(isset($_GET['categoryDelete'])){
            $id = $_GET['categoryDelete'];
            $deleteCategory = $category->deleteCategory($id);
        }
    }else{
        echo "<script>window.location='dashboard.php'</script>" ;   
    }
    
    
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Category</h3>
                <p class="text-subtitle text-muted">Category Data Table</p>
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
                Simple Category
            </div>
            <div class="card-body">
                <?php
                    if(isset($deleteCategory)){
                        echo $deleteCategory;
                    }
                ?>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $getCategoryData = $category->getCategoryData();
                            
                            if($getCategoryData){
                                while($getCategory = $getCategoryData->fetch_assoc()){     

                        ?>
                            <tr>
                                <td>
                                    <?php echo $getCategory['categoryName'];?>
                                </td>
                                <td>
                                    <a href="updatecategory.php?categoryUpdate=<?php echo $getCategory['id'];?>" type="submit" class="btn btn-primary btn-sm mr-1 mb-1"><i data-feather="edit-3" width="20"></i></a>
                                    <a href="?categoryDelete=<?php echo $getCategory['id'];?>" type="submit" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Do you want to delete Category.')"><i data-feather="x" width="20"></i></a>
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
