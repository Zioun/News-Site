<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
Class Userregistration{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function registration($data, $file){

        $userImageUrl = $this->fm->validation($data['userImageUrl']);
        $userFirstName = $this->fm->validation($data['userFirstName']);
        $userLastName = $this->fm->validation($data['userLastName']);
        $userUsername = $this->fm->validation($data['userUsername']);
        $userEmail = $this->fm->validation($data['userEmail']);
        $userPassword = $this->fm->validation(md5($data['userPassword']));
        $userPhone = $this->fm->validation($data['userPhone']);
        $userAddress = $this->fm->validation($data['userAddress']);

        $userImageUrl = mysqli_real_escape_string($this->db->link, $data['userImageUrl']);
        $userFirstName = mysqli_real_escape_string($this->db->link, $data['userFirstName']);
        $userLastName = mysqli_real_escape_string($this->db->link, $data['userLastName']);
        $userUsername = mysqli_real_escape_string($this->db->link, $data['userUsername']);
        $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $userPassword = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
        $userPhone = mysqli_real_escape_string($this->db->link,$data['userPhone']);
        $userAddress = mysqli_real_escape_string($this->db->link,$data['userAddress']);

        $userQuery = "SELECT * FROM userprofile WHERE userUsername = '$userUsername'";
        $userCheck = $this->db->select($userQuery);
        if($userCheck != false){
            return "<span style='color:red;' class='success'>Username already exist.</span>"; 
        }else{

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "admin/uploads/".$unique_image;

            if (empty($userFirstName) || empty($userLastName) || empty($userUsername) || empty($userEmail) || empty($userPhone) || empty($userAddress)|| empty($userPassword)){
                return "<span style='color:red;' class='error'>Input must not be empty!</span>";
            }else{

                if(empty($image)){
                    $query = "INSERT INTO userprofile (userImage,userFirstName,userLastName,userUsername,userEmail,userPhone,userAddress,userPassword) 
                VALUES('$userImageUrl','$userFirstName','$userLastName','$userUsername','$userEmail','$userPhone','$userAddress','$userPassword')";
                $inserted_rows = $this->db->insert($query);
                return "<span style='color:green;' class='error'>Registration Successfully.</span>";
                }else{
                    if ($image_size >1048567) {
                        return "<span style='color:red;' class='error'>Image Size should be less then 1MB!</span>";
                    }elseif (in_array($file_ext, $permited) === false) {
                        return "<span style='color:red;' class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                    } else{
                    move_uploaded_file($image_temp, $uploaded_image);
                    $query = "INSERT INTO userprofile (userImage,userFirstName,userLastName,userUsername,userEmail,userPhone,userAddress,userPassword) 
                    VALUES('$uploaded_image','$userFirstName','$userLastName','$userUsername','$userEmail','$userPhone','$userAddress','$userPassword')";
                    $inserted_rows = $this->db->insert($query);
                    if ($inserted_rows) {
                            return "<span style='color:green;' class='success'>Registration Successfully.</span>";
                        }else {
                            return "<span style='color:red;' class='error'>Image Not Inserted !</span>";
                        }
                    }
                }

                
            }
            
        }

    }

    public function showUserProfileData(){
        $userId = Session::get('userId');
        $query = "SELECT * FROM userprofile WHERE userId = '$userId'";
        $showUserProfileData = $this->db->select($query);
        return $showUserProfileData;
    }






}



?>