<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class Banner{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function getBannerData(){
        $query = "SELECT * FROM banner WHERE id = '1'";
        $getBannerData = $this->db->select($query);
        return $getBannerData;
    }

    public function getSquareBannerData(){
        $query = "SELECT * FROM banner WHERE id = '2'";
        $getSquareBannerData = $this->db->select($query);
        return $getSquareBannerData;
    }

    public function bannerUpdate($data, $file){

        $urlLink = $this->fm->validation($data['urlLink']);

        $urlLink = mysqli_real_escape_string($this->db->link, $data['urlLink']);


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
    
                $query = "UPDATE banner
                        SET
                        bannerImage = '$uploaded_image',
                        urlLink = '$urlLink'
                        WHERE id = '1'";
                $bannerUpdate = $this->db->update($query);
    
               if ($bannerUpdate) {
                    return "<span style='color:green;' class='success'>Banner Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>Banner Not Updated !</span>";
                }
            }

        }else{
            $query = "UPDATE banner
                     SET
                     urlLink = '$urlLink'
                     WHERE id = '1'";
        $bannerUpdate = $this->db->update($query);
            if ($bannerUpdate) {
                return "<span style='color:green;' class='success'>Banner Updated Successfully.</span>";
            }else {
                return "<span style='color:red;' class='error'>Banner Not Updated !</span>";
            }
        }
    }

    public function squareBannerUpdate($data, $file){

        $urlLink = $this->fm->validation($data['urlLink']);

        $urlLink = mysqli_real_escape_string($this->db->link, $data['urlLink']);


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
    
                $query = "UPDATE banner
                        SET
                        bannerImage = '$uploaded_image',
                        urlLink = '$urlLink'
                        WHERE id = '2'";
                $bannerUpdate = $this->db->update($query);
    
               if ($bannerUpdate) {
                    return "<span style='color:green;' class='success'>Banner Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>Banner Not Updated !</span>";
                }
            }

        }else{
            $query = "UPDATE banner
                     SET
                     urlLink = '$urlLink'
                     WHERE id = '2'";
        $bannerUpdate = $this->db->update($query);
            if ($bannerUpdate) {
                return "<span style='color:green;' class='success'>Banner Updated Successfully.</span>";
            }else {
                return "<span style='color:red;' class='error'>Banner Not Updated !</span>";
            }
        }
    }
}

?>