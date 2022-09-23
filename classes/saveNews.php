<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class SaveNews{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function saveNews($data){

        $newsId = $this->fm->validation($data['newsId']);
        $newsImage = $this->fm->validation($data['image']);
        $newsHeading = $this->fm->validation($data['newsHeading']);
        $newsParagraph = $this->fm->validation($data['newsParagraph']);
        $userId = $this->fm->validation($data['userId']);

        $newsId = mysqli_real_escape_string($this->db->link, $data['newsId']);
        $newsImage = mysqli_real_escape_string($this->db->link, $data['image']);
        $newsHeading = mysqli_real_escape_string($this->db->link, $data['newsHeading']);
        $newsParagraph = mysqli_real_escape_string($this->db->link, $data['newsParagraph']);
        $userId = mysqli_real_escape_string($this->db->link, $data['userId']);


        $saveQuery = "SELECT * FROM savenews WHERE newsHeading = '$newsHeading' AND userId = '$userId'";
        $saveCheck = $this->db->select($saveQuery);
        Session::set('saveCheck',$saveCheck);

        if($saveCheck == true){
            $msg = "<span style='color:red; margin-left:10px;'>News Already Saved!</span><br><br>";
            return $msg;
        }else{

            $query = "INSERT INTO savenews (newsId,newsImage,newsHeading,newsParagraph,userId) VALUE ('$newsId','$newsImage','$newsHeading','$newsParagraph','$userId')";
            $newsinsert = $this->db->insert($query);
            if($newsinsert){
                $msg = "<span style='color:green; margin-left:10px;'>News Seved Successfully!</span><br><br>";
                return $msg;
            }else{
                $msg = "<span style='color:red;'>News Not Seved!</span>";
                return $msg;
            }

        }
        
    }

    public function getSaveData(){
        $userId = Session::get('userId');
        $query = "SELECT * FROM savenews WHERE userId = '$userId' ORDER BY saveId DESC";
        $getSaveData = $this->db->insert($query);
        return $getSaveData;
    }

    public function getSaveCount(){
        $userId = Session::get('userId');
        $query = "SELECT * FROM savenews WHERE userId = '$userId' ORDER BY saveId DESC";
        $getSaveData = $this->db->insert($query);
        $count = mysqli_num_rows($getSaveData);
        return $count;
    }

    public function deleteSingleData($delSinData){
        $userId = Session::get('userId');
        $query = "DELETE FROM savenews WHERE userId = '$userId' AND saveId = '$delSinData'";
        $deleteSingleData = $this->db->delete($query);
        return $deleteSingleData;
    }

    public function deleteAllData(){
        $userId = Session::get('userId');
        $query = "DELETE FROM savenews WHERE userId = '$userId'";
        $deleteAllData = $this->db->delete($query);
        return $deleteAllData;
    }






}

?>