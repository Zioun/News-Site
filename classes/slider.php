<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class Slider{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function sliderInsert($data, $file){

        $heading = $this->fm->validation($data['heading']);
        $paragraph = $this->fm->validation($data['paragraph']);

        $heading = mysqli_real_escape_string($this->db->link, $data['heading']);
        $paragraph = mysqli_real_escape_string($this->db->link, $data['paragraph']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($file_name) || empty($heading)|| empty($paragraph)){
            $msg = "<span style='color:red;'>Input must not be empty!</span>";
            return $msg;
        }elseif($file_size >1048567){
            return "<span class='error'>Image Size should be less then 1MB!</span>";
        }elseif(in_array($file_ext, $permited) === false) {
            return "<span style='color:red;'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO slider (sliderImage,newsHeading,newsParagraph) VALUE ('$uploaded_image','$heading','$paragraph')";
            $sliderinsert = $this->db->insert($query);
            if($sliderinsert){
                $msg = "<span style='color:green;'>News Inserted Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color:red;'>News Not Inserted!</span>";
                return $msg;
            }
        }

    }

    public function getSliderData(){
        $query = "SELECT * FROM slider ORDER BY id DESC";
        $getSliderData = $this->db->select($query);
        return $getSliderData;
    }

    public function showSliderData($id){
        $query = "SELECT * FROM slider WHERE id = '$id'";
        $getSliderData = $this->db->select($query);
        return $getSliderData;
    }

    public function sliderUpdate($data, $file ,$id){

        $newsHeading = $this->fm->validation($data['newsHeading']);
        $newsParagraph = $this->fm->validation($data['newsParagraph']);

        $newsHeading = mysqli_real_escape_string($this->db->link, $data['newsHeading']);
        $newsParagraph = mysqli_real_escape_string($this->db->link, $data['newsParagraph']);

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
    
                $query = "UPDATE slider
                        SET
                        sliderImage = '$uploaded_image',
                        newsHeading = '$newsHeading',
                        newsParagraph = '$newsParagraph'
                        WHERE id = '$id'";
                $updateslider = $this->db->update($query);
    
               if ($updateslider) {
                    return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>News Not Updated !</span>";
                }
            }

        }else{
            $query = "UPDATE slider
            SET
            newsHeading = '$newsHeading',
            newsParagraph = '$newsParagraph'
            WHERE id = '$id'";
        $profileUpdate = $this->db->update($query);
            if ($profileUpdate) {
                return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
            }else {
                return "<span style='color:red;' class='error'>News Not Updated !</span>";
            }
        }
    }


    public function showUpdateData($id){
        $query = "SELECT * FROM slider WHERE id = '$id'";
        $getSliderData = $this->db->select($query);
        return $getSliderData;
    }

    public function deleteSliderNews($id){
        $query = "DELETE FROM slider  WHERE id = '$id'";
        $deletebk = $this->db->delete($query);
        if($deletebk){
            $msg = "<span class='success' style='color:green;'>News Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>News Not Deleted!</span>";
            return $msg;
        }

    }

    public function getSliderDataRows(){
        $query = "SELECT * FROM slider ORDER BY id DESC";
        $result = $this->db->select($query);
        $row = mysqli_num_rows($result);
        return $row;
    }
    



}

?>