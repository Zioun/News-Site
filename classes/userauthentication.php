<?php
    $filepath = realpath(dirname(__FILE__));
    Session::checkLogin();
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php

    Class Userauthentication{
        private $db;
        private $fm;
        
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }

        public function checkUserAuthentication($data){
            $userUsername = $this->fm->validation($data['userUsername']);
            $userPassword = $this->fm->validation(md5($data['userPassword']));
    
            $userUsername = mysqli_real_escape_string($this->db->link, $data['userUsername']);
            $userPassword = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
    
            if(empty($userUsername) || empty($userPassword)){
                $msg = "<span class='error' style='color:red;'>Input must not be empty!</span>";
                return $msg;
            }
    
            $query = "SELECT * FROM userprofile WHERE userUsername = '$userUsername' AND userPassword = '$userPassword'";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('userLogin', true);
                Session::set('userId', $value['userId']);
                header('Location:index.php');
            }else{
                $msg = "<span class='error' style='color:red;'>Email Or Password Not Matched!</span>";
                return $msg;
            }
    
        }

        public function userProfileData(){
            $userId = Session::get('userId');
            $query = "SELECT * FROM userprofile WHERE userId = '$userId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getUserRows(){
            $query = "SELECT * FROM authentications WHERE levels = 0";
            $result = $this->db->select($query);
            $result = mysqli_num_rows($result);
            return $result;
        }

        public function profileUpdate($data, $file ,$id){

            $userFirstName = $this->fm->validation($data['userFirstName']);
            $userLastName = $this->fm->validation($data['userLastName']);
            $userUsername = $this->fm->validation($data['userUsername']);
            $userEmail = $this->fm->validation($data['userEmail']);
            $userPhone = $this->fm->validation($data['userPhone']);
    
            $userFirstName = mysqli_real_escape_string($this->db->link, $data['userFirstName']);
            $userLastName = mysqli_real_escape_string($this->db->link, $data['userLastName']);
            $userUsername = mysqli_real_escape_string($this->db->link, $data['userUsername']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link,$data['userPhone']);
    
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
        
                    $query = "UPDATE userProfile
                            SET
                            userImage = '$uploaded_image',
                            userFirstName = '$userFirstName',
                            userLastName = '$userLastName',
                            userUsername = '$userUsername',
                            userEmail = '$userEmail',
                            userPhone = '$userPhone'
                            WHERE userId = '$id'";
                    $profileUpdate = $this->db->update($query);
        
                   if ($profileUpdate) {
                        return "<span style='color:green;' class='success'>Profile Updated Successfully.</span>";
                    }else {
                        return "<span style='color:red;' class='error'>Profile Not Updated !</span>";
                    }
                }
    
            }else{
                $query = "UPDATE userProfile
                SET
                userFirstName = '$userFirstName',
                userLastName = '$userLastName',
                userUsername = '$userUsername',
                userEmail = '$userEmail',
                userPhone = '$userPhone'
                WHERE userId = '$id'";
            $profileUpdate = $this->db->update($query);
                if ($profileUpdate) {
                    return "<span style='color:green;' class='success'>Profile Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>Profile Not Updated !</span>";
                }
            }
        }

        



    }

?>