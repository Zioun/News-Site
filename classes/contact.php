<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class Contact{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function contactMsg($data){

        $conName = $this->fm->validation($data['conName']);
        $conEmail = $this->fm->validation($data['conEmail']);
        $conMessage = $this->fm->validation($data['conMessage']);
        $checkMsg = $this->fm->validation($data['checkMsg']);

        $conName = mysqli_real_escape_string($this->db->link, $data['conName']);
        $conEmail = mysqli_real_escape_string($this->db->link, $data['conEmail']);
        $conMessage = mysqli_real_escape_string($this->db->link, $data['conMessage']);
        $checkMsg = $this->fm->validation($data['checkMsg']);

        if(empty($conName) || empty($conEmail) || empty($conMessage)){
            $msg = "<span style='color:red'>Input must not be empty!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO contact (conName,conEmail,conMessage,checkMsg) VALUE ('$conName','$conEmail','$conMessage','$checkMsg')";

            $contact = $this->db->insert($query);

            if($contact){
                $msg = "<span style='color:green;'>Message Send Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color:red;'>Message Not Inserted!</span>";
                return $msg;
            }
        }

    }

    public function getContactMsg(){
        $query = "SELECT * FROM contact ORDER BY conId DESC";
        $getContactMsg = $this->db->select($query);
        return $getContactMsg;
    }

    public function getContactMsgId($id){
        $query = "SELECT * FROM contact WHERE ConId = '$id'";
        $getContactMsgId = $this->db->select($query);
        return $getContactMsgId;
    }

    public function contactMsgId($id){
        $query = "DELETE FROM contact  WHERE conId = '$id'";
        $deleteCategory = $this->db->delete($query);
        if($deleteCategory){
            $msg = "<span class='success' style='color:green;'>Message Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>Message Not Deleted!</span>";
            return $msg;
        }

    }

    public function contactMsgRow(){
        $query = "SELECT * FROM category ORDER BY id DESC";
        $result = $this->db->select($query);
        $row = mysqli_num_rows($result);
        return $row;
    }
    



}

?>