<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
?>

<?php

Class Breaking{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function breakingNewsInsert($data, $file){

        $heading = $this->fm->validation($data['heading']);
        $reporterName = $this->fm->validation($data['reporterName']);

        $heading = mysqli_real_escape_string($this->db->link, $data['heading']);
        $reporterName = mysqli_real_escape_string($this->db->link, $data['reporterName']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($file_name) || empty($heading)){
            $msg = "<span style='color:red;'>Input must not be empty!</span>";
            return $msg;
        }elseif($file_size >1048567){
            return "<span class='error'>Image Size should be less then 1MB!</span>";
        }elseif(in_array($file_ext, $permited) === false) {
            return "<span style='color:red;'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO breakingnews (titleImage,newsHeading,reporterName) VALUE ('$uploaded_image','$heading','$reporterName')";
            $newsinsert = $this->db->insert($query);
            if($newsinsert){
                $msg = "<span style='color:green;'>News Inserted Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color:red;'>News Not Inserted!</span>";
                return $msg;
            }
        }

    }

    public function getBreakingNews(){
        $query = "SELECT breakingnews.*, authentications.adminName
                    FROM breakingnews
                    INNER JOIN authentications
                    ON breakingnews.reporterName = authentications.adminId
                ORDER BY id DESC";
        $getBreakingNews = $this->db->select($query);
        return $getBreakingNews;
    }

    public function DeleteBreakingNews($id){
        $query = "DELETE FROM breakingnews  WHERE id = '$id'";
        $deletebk = $this->db->delete($query);
        if($deletebk){
            $msg = "<span class='success' style='color:green;'>News Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>News Not Deleted!</span>";
            return $msg;
        }

    }

    public function getBreakingNewsId($id){
        $query = "SELECT * FROM breakingnews WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function breakingNewsUpdate($data, $file ,$id){

        $newsHeading = $this->fm->validation($data['newsHeading']);

        $newsHeading = mysqli_real_escape_string($this->db->link, $data['newsHeading']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(!empty($image)){
            if ($image_size >1048567) {
                return "<span style='color:red;' class='error'>Image Size should be less then 1MB!
                </span>";
            } elseif (in_array($file_ext, $permited) === false) {
                return "<span style='color:red;' class='error'>You can upload only:-"
                .implode(', ', $permited)."</span>";
            } else{
               move_uploaded_file($image_temp, $uploaded_image);
    
                $query = "UPDATE breakingnews
                        SET
                        titleImage = '$uploaded_image',
                        newsHeading = '$newsHeading'
                        WHERE id = '$id'";
                $bkNewsUpdate = $this->db->update($query);
    
               if ($bkNewsUpdate) {
                    return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>News Not Updated !</span>";
                }
            }

        }else{
            $query = "UPDATE breakingnews
            SET
            newsHeading = '$newsHeading'
            WHERE id = '$id'";
        $profileUpdate = $this->db->update($query);
            if ($profileUpdate) {
                return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
            }else {
                return "<span style='color:red;' class='error'>News Not Updated !</span>";
            }
        }
    }

    public function getBreakingNewsRows(){
        $query = "SELECT * FROM breakingnews ORDER BY id DESC";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

}


?>