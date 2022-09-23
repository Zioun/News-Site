<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
Class News{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }

    public function getCatData(){
        $query = "SELECT * FROM category ORDER BY id DESC";
        $showCategoryData = $this->db->select($query);
        return $showCategoryData;
    }

    public function newsInsert($data, $file){

        $catID         = $this->fm->validation($data['catID']);
        $newsHeading   = $this->fm->validation($data['newsHeading']);
        $newsParagraph = $this->fm->validation($data['newsParagraph']);
        $reporterName  = $this->fm->validation($data['reporterName']);


        $catID         = mysqli_real_escape_string($this->db->link, $data['catID']);
        $newsHeading   = mysqli_real_escape_string($this->db->link, $data['newsHeading']);
        $newsParagraph = mysqli_real_escape_string($this->db->link, $data['newsParagraph']);
        $reporterName  = mysqli_real_escape_string($this->db->link, $data['reporterName']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($catID) || empty($newsHeading)|| empty($newsParagraph)){
            $msg = "<span style='color:red;'>Input must not be empty!</span>";
            return $msg;
        }elseif($file_size >1048567){
            return "<span class='error'>Image Size should be less then 1MB!</span>";
        }elseif(in_array($file_ext, $permited) === false) {
            return "<span style='color:red;'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO news (newsImage,newsHeading,newsParagraph,category,reporterName) VALUE ('$uploaded_image','$newsHeading','$newsParagraph',$catID,$reporterName)";
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
// show new for usersite
    public function getNewsData(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*, category.categoryName, authentications.adminName
                    FROM news
                    INNER JOIN category
                    ON news.category = category.id
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getSearch(){
        $search = Session::get('search');
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*, category.categoryName, authentications.adminName
                    FROM news
                    INNER JOIN category
                    ON news.category = category.id
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE newsHeading LIKE '%$search%' ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getSearch = $this->db->select($query);
        return $getSearch;
    }


    public function getNewsBusiness(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 8 ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }


    public function getNewsFashion(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 12 ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsTechnology(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 9 ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsPolitics(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 10 ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsGame(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 11 ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }
//  end show new for usersite


//  show new for adminsite

    public function getNewsDataAdmin(){
        $query = "SELECT news.*, category.categoryName, authentications.adminName
                    FROM news
                    INNER JOIN category
                    ON news.category = category.id
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }


    public function getNewsBusinessAdmin(){
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 8 ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }


    public function getNewsFashionAdmin(){
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 12 ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsTechnologyAdmin(){
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 9 ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsPoliticsAdmin(){
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 10 ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

    public function getNewsGameAdmin(){
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = 11 ORDER BY newsId DESC";
        $getNewsData = $this->db->select($query);
        return $getNewsData;
    }

//  end show new for adminsite

    public function showNewsData($id){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE newsId = '$id'";
        $showNewsData = $this->db->select($query);
        return $showNewsData;
    }

    public function newsUpdate($data, $file ,$id){

        $newsHeading = $this->fm->validation($data['newsHeading']);
        $newsParagraph = $this->fm->validation($data['newsParagraph']);
        $catID = $this->fm->validation($data['catID']);

        $newsHeading = mysqli_real_escape_string($this->db->link, $data['newsHeading']);
        $newsParagraph = mysqli_real_escape_string($this->db->link, $data['newsParagraph']);
        $catID = mysqli_real_escape_string($this->db->link, $data['catID']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($newsHeading) || empty($newsParagraph)){
            return "<span style='color:red;' class='error'>Input must not be empty!</span>";
        }else{
            if(!empty($image)){
                if ($image_size >1048567) {
                    return "<span style='color:red;' class='error'>Image Size should be less then 1MB!
                    </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    return "<span style='color:red;' class='error'>You can upload only:-"
                    .implode(', ', $permited)."</span>";
                } else{
                   move_uploaded_file($image_temp, $uploaded_image);
        
                    $query = "UPDATE news
                            SET
                            newsImage = '$uploaded_image',
                            newsHeading = '$newsHeading',
                            newsParagraph = '$newsParagraph',
                            category = '$catID'
                            WHERE newsId = '$id'";
                    $updateslider = $this->db->update($query);
        
                   if ($updateslider) {
                        return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
                    }else {
                        return "<span style='color:red;' class='error'>News Not Updated !</span>";
                    }
                }
    
            }else{
                $query = "UPDATE news
                SET
                newsHeading = '$newsHeading',
                newsParagraph = '$newsParagraph',
                category = '$catID'
                WHERE newsId = '$id'";
            $profileUpdate = $this->db->update($query);
                if ($profileUpdate) {
                    return "<span style='color:green;' class='success'>News Updated Successfully.</span>";
                }else {
                    return "<span style='color:red;' class='error'>News Not Updated !</span>";
                }
            }
        }
    }


    public function showNewsDataId($id){
        $query = "SELECT * FROM news WHERE newsId = '$id'";
        $showNewsUpdateData = $this->db->select($query);
        return $showNewsUpdateData;
    }

    public function deleteNews($id){
        $query = "DELETE FROM news  WHERE newsId = '$id'";
        $deleteNews = $this->db->delete($query);
        if($deleteNews){
            $msg = "<span class='success' style='color:green;'>News Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span class='error' style='color:red;'>News Not Deleted!</span>";
            return $msg;
        }

    }

    public function singleBusinessNews(){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE category = 8 ORDER BY rand()";
        $singleBusinessNews = $this->db->select($query);
        return $singleBusinessNews;
    }

    public function multiBusinessNews(){
        $query = "SELECT * FROM news WHERE category = '8' ORDER BY rand() LIMIT 5";
        $multiBusinessNews = $this->db->select($query);
        return $multiBusinessNews;
    }

    public function singleFashionsNews(){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE category = 12 ORDER BY rand()";
        $singleBusinessNews = $this->db->select($query);
        return $singleBusinessNews;
    }

    public function multiFashionsNews(){
        $query = "SELECT * FROM news WHERE category = '12' ORDER BY rand() LIMIT 5";
        $multiFashionsNews = $this->db->select($query);
        return $multiFashionsNews;
    }

    public function singleTechnologyNews(){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE category = 9 ORDER BY rand()";
        $singleBusinessNews = $this->db->select($query);
        return $singleBusinessNews;
    }

    public function multiTechnologyNews(){
        $query = "SELECT * FROM news WHERE category = '9' ORDER BY rand() LIMIT 5";
        $multiTechnologyNews = $this->db->select($query);
        return $multiTechnologyNews;
    }

    public function singlePoliticsNews(){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE category = 10 ORDER BY rand()";
        $singleBusinessNews = $this->db->select($query);
        return $singleBusinessNews;
    }

    public function multiPoliticsNews(){
        $query = "SELECT * FROM news WHERE category = '10' ORDER BY rand() LIMIT 5";
        $multiPoliticsNews = $this->db->select($query);
        return $multiPoliticsNews;
    }

    public function singleGameNews(){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE category = 11 ORDER BY rand()";
        $singleBusinessNews = $this->db->select($query);
        return $singleBusinessNews;
    }

    public function multiGameNews(){
        $query = "SELECT * FROM news WHERE category = '11' ORDER BY rand() LIMIT 5";
        $multiGameNews = $this->db->select($query);
        return $multiGameNews;
    }
    
    public function latestBusiness(){
        $query = "SELECT * FROM news WHERE category = '8' ORDER BY newsId DESC LIMIT 1";
        $latestBusiness = $this->db->select($query);
        return $latestBusiness;
    }

    public function latestFashion(){
        $query = "SELECT * FROM news WHERE category = '12' ORDER BY newsId DESC LIMIT 1";
        $latestFashion = $this->db->select($query);
        return $latestFashion;
    }

    public function latestTechnology(){
        $query = "SELECT * FROM news WHERE category = '9' ORDER BY newsId DESC LIMIT 1";
        $latestTechnology = $this->db->select($query);
        return $latestTechnology;
    }

    public function latestPolitics(){
        $query = "SELECT * FROM news WHERE category = '10' ORDER BY newsId DESC LIMIT 1";
        $latestPolitics = $this->db->select($query);
        return $latestPolitics;
    }

    public function latestGame(){
        $query = "SELECT * FROM news WHERE category = '11' ORDER BY newsId DESC LIMIT 1";
        $latestGame = $this->db->select($query);
        return $latestGame;
    }

    public function categoryNews(){
        $id = Session::get('$catId');
        $query = "SELECT news.*,authentications.adminName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    WHERE category = '$id' ORDER BY newsId DESC";
        $categoryNews = $this->db->select($query);
        return $categoryNews;
    }

    public function news(){
        $search = Session::get('$search');
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news  WHERE newsHeading LIKE '%$search%' ORDER BY newsId DESC LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function pagination(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }

    public function business(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news WHERE category = '8' LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function paginationForBusiness(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news WHERE category='8'";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }


    public function fashion(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news WHERE category = '12' LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function paginationForFashion(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news WHERE category='12'";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }

    public function technology(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news WHERE category = '9' LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function paginationForTechnology(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news WHERE category='9'";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }

    public function politics(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news WHERE category = '10' LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function paginationForPolitics(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news WHERE category='10'";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }

    public function game(){
        $perPage = Session::get('perPage');
        $startForm = Session::get('startForm');
        $query = "SELECT * FROM news WHERE category = '11' LIMIT $startForm,$perPage";
        $news = $this->db->select($query);
        return $news;
    }

    public function paginationForGame(){
        $perPage = Session::get('perPage');
        $query = "SELECT * FROM news WHERE category='11'";
        $pagination = $this->db->select($query);
        $totalRow = mysqli_num_rows($pagination);
        Session::set('rowcount',$totalRow);
        $totalPage = ceil($totalRow/$perPage);
        Session::set('getPage',$totalPage);
        return $pagination;
    }

    public function detailsNews($id){
        $query = "SELECT news.*,authentications.adminName,category.categoryName
                    FROM news
                    INNER JOIN authentications
                    ON news.reporterName = authentications.adminId
                    INNER JOIN category
                    ON news.category = category.id
                    WHERE newsId = '$id'";
        $detailsNews = $this->db->select($query);
        return $detailsNews;
    }

    public function getRelatednews($catId){
        $query = "SELECT * FROM news WHERE category = '$catId' ORDER BY rand() LIMIT 4";
        $detailsCatNews = $this->db->select($query);
        return $detailsCatNews;
    } 

    public function getBusinessNewsRows(){
        $query = "SELECT * FROM news WHERE category = 8";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getFashionNewsRows(){
        $query = "SELECT * FROM news WHERE category = 12";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getTechnologyNewsRows(){
        $query = "SELECT * FROM news WHERE category = 9";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getPoliticsNewsRows(){
        $query = "SELECT * FROM news WHERE category = 10";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getGameNewsRows(){
        $query = "SELECT * FROM news WHERE category = 11";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function getNewsRows(){
        $query = "SELECT * FROM news";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }


    public function getReporterRows($id){
        $query = "SELECT * FROM news WHERE reporterName = '$id'";
        $result = $this->db->select($query);
        $reporterRows = mysqli_num_rows($result);
        Session::set('reporterRows', $reporterRows);
        return $reporterRows;
    }


    public function getAllNews(){
        $query = "SELECT * FROM news ORDER BY rand() LIMIT 5";
        $getAllNews = $this->db->select($query);
        return $getAllNews;
    }

    public function getAllNewsHeading(){
        $query = "SELECT * FROM news ORDER BY rand() LIMIT 25";
        $getAllNewsHeading = $this->db->select($query);
        return $getAllNewsHeading;
    }



}

?>