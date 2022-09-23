<?php
    $filepath = realpath(dirname(__FILE__));
    include($filepath.'/../lib/session.php');
    Session::checkLogin();
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php

    Class Authentication{
        private $db;
        private $fm;
        
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }

        public function authentication($adminUser, $adminPass){
            $authUser = $this->fm->validation($adminUser);
            $authPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)){
                $loginmsg = "Username or Password must not be empty!";
                return $loginmsg;
            }else{
                $query = "SELECT * FROM authentications WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set("login", true);
                    Session::set("adminId", $value['adminId']);
                    Session::set("adminImage", $value['adminImage']);
                    Session::set("adminName", $value['adminName']);
                    Session::set("adminLastName", $value['adminLastName']);
                    Session::set("adminUser", $value['adminUser']);
                    Session::set("adminEmail", $value['adminEmail']);
                    Session::set("adminPhone", $value['phoneNumber']);
                    Session::set("levels", $value['levels']);
                    
                    header("Location:dashboard.php");
                }else{
                    $loginmsg = "Username or Password not match !";
                    return $loginmsg;
                }
            }
        }

        public function profileData(){
            $query = "SELECT * FROM authentications";
            $result = $this->db->select($query);
            return $result;
        }

        public function getUserRows(){
            $query = "SELECT * FROM authentications WHERE levels = 0";
            $result = $this->db->select($query);
            $result = mysqli_num_rows($result);
            return $result;
        }

        



    }

?>