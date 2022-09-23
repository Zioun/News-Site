<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
Class Registration{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function registration($data, $file){

        $firstName = $this->fm->validation($data['firstName']);
        $lastName = $this->fm->validation($data['lastName']);
        $userName = $this->fm->validation($data['userName']);
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation(md5($data['password']));
        $phoneNumber = $this->fm->validation($data['phoneNumber']);

        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $phoneNumber = mysqli_real_escape_string($this->db->link,$data['phoneNumber']);

        $userQuery = "SELECT * FROM authentications WHERE adminUser = '$userName'";
        $userCheck = $this->db->select($userQuery);
        if($userCheck != false){
            return "<span style='color:green;' class='success'>Username already exist.</span>"; 
        }else{

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if (empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($password)){
                return "<span style='color:red;' class='error'>Please Select any Image !</span>";
        }elseif ($image_size >1048567) {
            return "<span style='color:red;' class='error'>Image Size should be less then 1MB!
            </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            return "<span style='color:red;' class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
        } else{
           move_uploaded_file($image_temp, $uploaded_image);
           $query = "INSERT INTO authentications (adminImage,adminName,adminLastName,adminUser,adminEmail,adminPass,phoneNumber) 
           VALUES('$uploaded_image','$firstName','$lastName','$userName','$email','$password','$phoneNumber')";
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



?>