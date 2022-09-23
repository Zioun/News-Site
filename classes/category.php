<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class Category{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function categoryInsert($data){

        $categoryName = $this->fm->validation($data['categoryName']);

        $categoryName = mysqli_real_escape_string($this->db->link, $data['categoryName']);


        if(empty($categoryName)){
            $msg = "<span style='color:red'>Input must not be empty!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO category (categoryName) VALUE ('$categoryName')";

            $categoryinsert = $this->db->insert($query);

            if($categoryinsert){
                $msg = "<span style='color:green;'>News Inserted Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color:red;'>News Not Inserted!</span>";
                return $msg;
            }
        }

    }

    public function getCategoryData(){
        $query = "SELECT * FROM category ORDER BY id DESC";
        $showCategoryData = $this->db->select($query);
        return $showCategoryData;
    }

    public function getCategoryId($id){
        $query = "SELECT * FROM category WHERE id = '$id'";
        $showCategoryData = $this->db->select($query);
        return $showCategoryData;
    }

    public function categoryUpdate($data, $id){

        $categoryName = $this->fm->validation($data['categoryName']);

        $categoryName = mysqli_real_escape_string($this->db->link, $data['categoryName']);

        if(empty($categoryName)){
            $msg = "<span style='color:red;'>Input must not be empty!</span>";
            return $msg;
        }else{
            $query = "UPDATE category
            SET
            categoryName = '$categoryName'
            WHERE id = '$id'";

            $categoryUpdate = $this->db->update($query);
            if ($categoryUpdate) {
                $msg = "<span style='color:green;' class='success'>Category Updated Successfully.</span>";
                return $msg;
            }else {
                $msg = "<span style='color:red;' class='error'>Category Not Updated !</span>";
                return $msg;
            }
        }
    }

    public function deleteCategory($id){
        $query = "DELETE FROM category  WHERE id = '$id'";
        $deleteCategory = $this->db->delete($query);
        if($deleteCategory){
            $msg = "<span class='success' style='color:green;'>Category Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>Category Not Deleted!</span>";
            return $msg;
        }

    }

    public function getCategoryDataRows(){
        $query = "SELECT * FROM category ORDER BY id DESC";
        $result = $this->db->select($query);
        $row = mysqli_num_rows($result);
        return $row;
    }
    



}

?>