<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class User{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function getUserRows(){
        $query = "SELECT * FROM authentications WHERE levels = 0 ";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getUserData(){
        $query = "SELECT * FROM authentications";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteUser($id){
        $query = "DELETE FROM authentications WHERE adminId = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $msg = "<span class='success' style='color:green;'>User Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>User Not Deleted!</span>";
            return $msg;
        }
    }

    public function getUserIdData($id){
        $query = "SELECT * FROM authentications WHERE adminId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateUser($data, $file ,$id){

        $firstName = $this->fm->validation($data['firstName']);
        $lastName = $this->fm->validation($data['lastName']);
        $userName = $this->fm->validation($data['userName']);
        $email = $this->fm->validation($data['email']);
        $phoneNumber = $this->fm->validation($data['phoneNumber']);

        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);

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
    
                $query = "UPDATE authentications
                        SET
                        adminImage = '$uploaded_image',
                        adminName = '$firstName',
                        adminLastName = '$lastName',
                        adminUser = '$userName',
                        adminEmail = '$email',
                        phoneNumber = '$phoneNumber'
                        WHERE adminId = '$id'";
                $userUpdate = $this->db->update($query);
    
               if ($userUpdate) {
                    return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>News Not Updated !</span>";
                }
            }

        }else{
            $query = "UPDATE authentications
            SET
            adminName = '$firstName',
            adminLastName = '$lastName',
            adminUser = '$userName',
            adminEmail = '$email',
            phoneNumber = '$phoneNumber'
            WHERE adminId = '$id'";
            $userUpdate = $this->db->update($query);
            if ($userUpdate) {
                return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
            }else {
                return "<span style='color:red;' class='error'>News Not Updated !</span>";
            }
        }
    }


    public function updateUserLevel($id){
        $query = "UPDATE authentications
        SET
        levels = 1
        WHERE adminId = '$id'";
        $userUpdate = $this->db->update($query);
        if ($userUpdate) {
            return "<span style='color:green;' class='success'>User Promoted Successfully.</span>";
        }else {
            return "<span style='color:red;' class='error'>User Not Promoted !</span>";
        }
    }

}

?>