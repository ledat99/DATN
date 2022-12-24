<?php
// include '../lib/session.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
// include_once ("$_SERVER[DOCUMENT_ROOT]/website_mvc/lib/database.php");
// include_once ("$_SERVER[DOCUMENT_ROOT]/website_mvc/helpers/format.php");
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function search_product($key){
        $key = $this->fm->validation($key);
        $query = "select  product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID where ProductName like'%$key%'";
        $result = $this->db->select($query);
        return $result;

        
    }
    public function count_search_product($key){
        $key = $this->fm->validation($key);
        $query = "select  count(product.ProductID) as count
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID where ProductName like'%$key%'";
        $result = $this->db->select($query);
        return $result;

        
    }
    public function insert_product($data, $files)
    {
        // $productName = $this->fm->validation($productName);

        $manufacturer = mysqli_real_escape_string($this->db->link, $data['manufacturer']);
        $productName = mysqli_real_escape_string($this->db->link,  $data['productName']);
        $price = mysqli_real_escape_string($this->db->link,  $data['price']);
        $amount = mysqli_real_escape_string($this->db->link,  $data['amount']);
        $screen = mysqli_real_escape_string($this->db->link,  $data['screen']);
        $operating_system = mysqli_real_escape_string($this->db->link,  $data['operating_system']);
        $front_camera = mysqli_real_escape_string($this->db->link,  $data['front_camera']);
        $back_camera = mysqli_real_escape_string($this->db->link,  $data['back_camera']);
        $cpu = mysqli_real_escape_string($this->db->link,  $data['cpu']);
        $ram = mysqli_real_escape_string($this->db->link,  $data['ram']);
        $rom = mysqli_real_escape_string($this->db->link,  $data['rom']);
        $sdcard = mysqli_real_escape_string($this->db->link,  $data['sdcard']);
        $battery = mysqli_real_escape_string($this->db->link,  $data['battery']);
        // $numberofreviews = mysqli_real_escape_string($this->db->link,  $data['numberofreviews']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $manufacturer == "" || $price == "" || $amount == "" || $screen == "" || $operating_system == "" 
        || $front_camera == "" || $back_camera == "" || $cpu == "" || $ram == "" || $rom == "" || $sdcard == "" || $battery == ""  || $file_name == "") {
            $alert = "<span class='error'> Field must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "Insert into product(ProductName,ManufacturerID,Price,Amount,Screen,Operatingsystem,Frontcamera,Backcamera,CPU,RAM,ROM,SDCard,Battery,Image)
                 values('$productName','$manufacturer','$price','$amount','$screen','$operating_system','$front_camera','$back_camera','$cpu','$ram','$rom','$sdcard','$battery','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert Product successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product not successfully</span>";
                return $alert;
            }
        }
    }
    
    public function insert_slider($data, $files){
        
        $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
        $type = mysqli_real_escape_string($this->db->link,  $data['type']);
        
       //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

       $permited = array('jpg', 'jpeg', 'png', 'gif');
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];

       $div = explode('.', $file_name);
       $file_ext = strtolower(end($div)); //lay duoi jpg,..
      // $file_current = strtolower(end($div));
       $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
       $uploaded_image = "uploads/" . $unique_image;


       if ($sliderName == "" || $type == "" ) {
           $alert = "<span class='error'> Field must be not empty</span>";
           return $alert;
       } else  {
           if(!empty($file_name)){
               //neey nguoi dung chon anh
           if($file_size >1024000){
              
               $alert = "<span class='error'>Image Size should be less than 1MB!</span>";
               return $alert;
           }
           elseif (in_array($file_ext, $permited) === false){
              // echo "<span class='error'> You can upload only:-".implode(',',$permited)."</span>";
               $alert = "<span class='error'> You can upload only:-".implode(',',$permited)."</span>";
               return $alert; 

           }
           move_uploaded_file($file_temp, $uploaded_image);
           $query = "Insert into tbl_slider(sliderName,type,slider_image)
           values('$sliderName','$type','$unique_image')";
      $result = $this->db->insert($query);
      if ($result) {
          $alert = "<span class='success'>Slider Added successfully</span>";
          return $alert;
      } else {
          $alert = "<span class='error'>Slider Added not successfully</span>";
          return $alert;
      }
                

       }
       
    }

    }
    public function show_product()
    {
        $query = "select p.*,m.ManufacturerName
         from product as p , manufacturer as m
         where p.ManufacturerID= m.ManufacturerID
          order by p.ProductID desc";
          $result = $this->db->select($query);
        return $result;

        // $query = "select tbl_product.*,tbl_category.catName,tbl_brand.brandName
        // from tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
        // INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        //  order by productId desc";
        // $query = "select * from tbl_product order by productId desc";
        // $result = $this->db->select($query);
        // return $result;



        // $query = "select *from product order by ProductID";
        // $result = $this->db->select($query);
        // return $result;
    }
    public function show_slider()
    {
        $query ="Select * from tbl_slider where type='1'  order by sliderId desc";
        $result = $this->db->select($query);
        
        
        return $result;
    }
    public function show_slider_list()
    {
        $query ="Select * from tbl_slider   order by sliderId desc";
        $result = $this->db->select($query);
        
        
        return $result;
    }
    public function update_type_slider($id,$type){
        
        $type = mysqli_real_escape_string($this->db->link,$type);
        
        $query ="Update  tbl_slider set type='$type' where sliderid='$id' ";
        $result = $this->db->update($query);

        
    }
    public function del_slider($id){
        $query = "DELETE FROM tbl_slider WHERE sliderid='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Delete Slider successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Delete Slider not successfully</span>";
            return $alert;
        }

    }
    public function update_product($data,$file,$id)
    {

       
        $manufacturer = mysqli_real_escape_string($this->db->link, $data['manufacturer']);
        $productName = mysqli_real_escape_string($this->db->link,  $data['productName']);
        $price = mysqli_real_escape_string($this->db->link,  $data['price']);
        $amount = mysqli_real_escape_string($this->db->link,  $data['amount']);
        $screen = mysqli_real_escape_string($this->db->link,  $data['screen']);
        $operating_system = mysqli_real_escape_string($this->db->link,  $data['operating_system']);
        $front_camera = mysqli_real_escape_string($this->db->link,  $data['front_camera']);
        $back_camera = mysqli_real_escape_string($this->db->link,  $data['back_camera']);
        $cpu = mysqli_real_escape_string($this->db->link,  $data['cpu']);
        $ram = mysqli_real_escape_string($this->db->link,  $data['ram']);
        $rom = mysqli_real_escape_string($this->db->link,  $data['rom']);
        $sdcard = mysqli_real_escape_string($this->db->link,  $data['sdcard']);
        $battery = mysqli_real_escape_string($this->db->link,  $data['battery']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div)); //lay duoi jpg,..
       // $file_current = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


        if ($productName == "" || $manufacturer == "" || $price == "" || $amount == "" || $screen == "" || $operating_system == "" 
        || $front_camera == "" || $back_camera == "" || $cpu == "" || $ram == "" || $rom == "" || $sdcard == "" || $battery == ""   ) {
            $alert = "<span class='error'> Field must be not empty</span>";
            return $alert;
        } else  {
            if(!empty($file_name)){
                //neey nguoi dung chon anh
            if($file_size >1024000){
               
                $alert = "<span class='error'>Image Size should be less than 1MB!</span>";
                return $alert;
            }
            elseif (in_array($file_ext, $permited) === false){
               // echo "<span class='error'> You can upload only:-".implode(',',$permited)."</span>";
                $alert = "<span class='error'> You can upload only:-".implode(',',$permited)."</span>";
                return $alert; 

            }
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE product SET 
            ProductName ='$productName',
            ManufacturerID ='$manufacturer',
            Price ='$price',
            Amount ='$amount',
            Screen ='$screen',
            OperatingSystem ='$operating_system',
            FrontCamera ='$front_camera',
            BackCamera ='$back_camera',
            CPU ='$cpu',
            RAM ='$ram',
            ROM ='$rom',
            SDCard ='$sdcard',
            Battery ='$battery',
            Image='$unique_image'
            
            
             where ProductID ='$id'";         

        }
        
        else{
           
            // neu khong chon anh
            $query = "UPDATE product SET 
            ProductName ='$productName',
            ManufacturerID ='$manufacturer',
            Price ='$price',
            Amount ='$amount',
            Screen ='$screen',
            OperatingSystem ='$operating_system',
            FrontCamera ='$front_camera',
            BackCamera ='$back_camera',
            CPU ='$cpu',
            RAM ='$ram',
            ROM ='$rom',
            SDCard ='$sdcard',
            Battery ='$battery'
            
            
             where ProductID ='$id'"; 


        }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Product Update successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Product not successfully</span>";
                return $alert;
            }
        
        }
    }
    public function del_product($id)
    {
        $query = "DELETE FROM product WHERE ProductID='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Delete Product successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Delete Product not successfully</span>";
            return $alert;
        }
    }
    public function del_wlist($proid,$customer_id){
        $query = "DELETE FROM tbl_wishlist WHERE productId='$proid' and customer_id='$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "select * from product where ProductID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    //ENd Backend
    public function getproduct_feathered(){
        $query = "select * from tbl_product where type='0'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_product(){
        $query = "select product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID
         order by ProductID";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getproduct_new(){
        $product_perpage=3;// số lượng sản phẩm mỗi trang
        // $query = "select * from product order by ProductID  desc LIMIT 6";
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        $per_page=($page-1)*3;// vị trí sản phẩm đang lấy ở từng trang
        $query = "select product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID
         order by ProductID desc LIMIT $per_page, $product_perpage "; // lấy từ vị trí $per_page lấy số lượng sản phẩm là $product_perpage
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_by_search_page($key){
        $product_search_perpage=3;// số lượng sản phẩm mỗi trang
        // $query = "select * from product order by ProductID  desc LIMIT 6";
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        $per_page=($page-1)*3;// vị trí sản phẩm đang lấy ở từng trang
        $query = "select  product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID where ProductName like'%$key%'
         order by ProductID desc LIMIT $per_page, $product_search_perpage "; // lấy từ vị trí $per_page lấy số lượng sản phẩm là $product_perpage
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
       
          $query = "select product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID
       
         where product.ProductID = '$id'";
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_review_by_product($id){
        $query = "select count(review.ReviewID) as total_review  from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id  " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_total_5_star_by_product($id){
        $query = "select count(review.ReviewID) as 5_star from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id and StarRating=5 " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_total_4_star_by_product($id){
        $query = "select count(review.ReviewID) as 4_star from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id and StarRating=4 " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_total_3_star_by_product($id){
        $query = "select count(review.ReviewID) as 3_star from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id and StarRating=3 " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_total_2_star_by_product($id){
        $query = "select count(review.ReviewID) as 2_star from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id and StarRating=2 " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_total_1_star_by_product($id){
        $query = "select count(review.ReviewID) as 1_star from review,product
       
         where product.ProductID = review.ProductID and product.ProductID=$id and StarRating=1 " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_avg_star_by_product($id){
        $query = "select AVG(StarRating) as avg  from review,product
       
        where product.ProductID = review.ProductID and product.ProductID=$id " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_comment_by_product($id){
        $query = "select user.Username ,review.* from review,product,user
       
         where product.ProductID = review.ProductID and product.ProductID=$id and review.UserID=user.UserID " ;
        
        $result = $this->db->select($query);
        return $result;
    }
    public function get_new_comment_by_product($id){
        $comment_per_page=3;// số lượng comment mỗi trang
     
        if(!isset($_GET['comment_page'])){
            $page=1;
        }else{
            $page=$_GET['comment_page'];
        }
        $per_page=($page-1)*3;// vị trí comment đang lấy ở từng trang
        $query = "select user.Username ,review.* from review,product,user
       
         where product.ProductID = review.ProductID and product.ProductID = $id and review.UserID=user.UserID
         order by ReviewID desc LIMIT $per_page, $comment_per_page " ;
        
        $result = $this->db->select($query);
        return $result;

    }
    public function getproductbyApple(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=1  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyXiaoMi(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=2  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbySamsung(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=3  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyOppo(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=4  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyHuawei(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=5  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyNokia(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=6  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyMobiistar(){
        $query = "select manufacturer.*,product.*,promotion.* from manufacturer,product,promotiondetails,promotion
        where manufacturer.ManufacturerID = product.ManufacturerID and
        promotiondetails.ProductID  = product.ProductID and
        promotiondetails.PromotionID=promotion.PromotionID
        and manufacturer.ManufacturerID=9  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestDell(){
        $query = "select * from tbl_product where brandId ='1' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestOppo(){
        $query = "select * from tbl_product where brandId ='6' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestHuawei(){
        $query = "select * from tbl_product where brandId ='7' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSamsung(){
        $query = "select * from tbl_product where brandId ='3' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_compare($customer_id){
        $query = "select * from tbl_compare where customer_id ='$customer_id' order by id desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_wishlist($customer_id){
        $query = "select * from tbl_wishlist where customer_id ='$customer_id' order by id desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertCompare($productid,$customer_id){
        
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
       
        // echo session_id();
       
        $query_check_compare = "Select *from tbl_compare where productid='$productid' and customer_id='$customer_id'";//câu truy vấn
        $check_compare=$this->db->select($query_check_compare);// thực hiện lệnh
        
        // if(mysqli_num_rows($check_cart)>0){
            if($check_compare){
           
            $alert="<span class='error'>Product Added to Compare</span>";
            return $alert;
        }
        else{
            
        $query = "Select *from tbl_product where productId='$productid'";
        $result= $this->db->select($query)->fetch_assoc();
        $productName=$result["productName"];
        $price=$result["price"];
        $image=$result["image"];
        $query_insert = "Insert into tbl_compare(productId,customer_id,productName,price,image)
        values('$productid','$customer_id','$productName','$price','$image')";
        
        $insert_compare = $this->db->insert($query_insert);
        if ($insert_compare) {
            $alert = "<span class='success'>Added compare successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Added compare not successfully</span>";
            return $alert;
        }}
    
    }
    public function insertWishlist($productid, $customer_id){
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
       
        $query_wlist = "Select *from tbl_wishlist where productid='$productid' and customer_id='$customer_id'";//câu truy vấn
        $check_wlist=$this->db->select($query_wlist);// thực hiện lệnh

        if($check_wlist){
           
            $alert="<span class='error'>Product Added to Wishlist</span>";
            return $alert;
        }
        else{

        $query = "Select *from tbl_product where productId='$productid'";
        $result= $this->db->select($query)->fetch_assoc();
        $productName=$result["productName"];
        $price=$result["price"];
        $image=$result["image"];
        // echo session_id();
       
        
        
        // if(mysqli_num_rows($check_cart)>0){
          
        $query_insert = "Insert into tbl_wishlist(productId,customer_id,productName,price,image)
        values('$productid','$customer_id','$productName','$price','$image')";
        
        $insert_compare = $this->db->insert($query_insert);
        if ($insert_compare) {
            $alert = "<span class='success'>Added wishlist successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Added wishlist not successfully</span>";
            return $alert;
        }}

    }
    public function countProduct(){
        $query_count_product="Select count(ProductID) as count from product ";
        $result =$this->db->select($query_count_product);
        return $result;
    }
    
    
    
}

    
