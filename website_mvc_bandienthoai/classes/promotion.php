<?php


$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

class promotion
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_promotion($promotionName,$promotionType,$promotionValue,$startDate,$endDate)
    {
        $promotionName = $this->fm->validation($promotionName);
        $promotionType =$this->fm->validation($promotionType);
        $promotionValue =$this->fm->validation($promotionValue);
        $startDate =$this->fm->validation($startDate);
        $endDate =$this->fm->validation($endDate);
       

        $promotionName = mysqli_real_escape_string($this->db->link, $promotionName);
        $promotionType = mysqli_real_escape_string($this->db->link, $promotionType);
        $promotionValue = mysqli_real_escape_string($this->db->link, $promotionValue);
        $startDate = mysqli_real_escape_string($this->db->link, $startDate);
        $endDate = mysqli_real_escape_string($this->db->link, $endDate);
       
        
        
  
        // insert into promotion(promotionName,promotionType,promotionValue,startDate,endDate) values('$promotionName','$promotionType','$promotionValue','$startDate','$endDate')
        if (empty($promotionName)||empty($promotionType)||!isset($promotionValue)||empty($startDate) ||empty($endDate)) {
            $alert = "<span class='error'>Field must be not empty</span>";
            return $alert;
        } else {
            $query = "insert into promotion(PromotionName,PromotionType,PromotionValue,StartDate,EndDate) values('$promotionName','$promotionType','$promotionValue','$startDate','$endDate')";
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='success'>Insert Promotion Successfully </span>";
                return $alert;

            }
            else{
                $alert ="<span class='error'>Insert Promotion Not Success </span>";
                return $alert;
            }
           
        }
    }
    public function show_promotion(){
        $query = "select *from promotion order by promotionID";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_promotion($promotionName,$promotionType,$promotionValue,$startDate,$endDate,$id){
        $promotionName = $this->fm->validation($promotionName);
        $promotionType =$this->fm->validation($promotionType);
        $promotionValue =$this->fm->validation($promotionValue);
        $startDate =$this->fm->validation($startDate);
        $endDate =$this->fm->validation($endDate);

        $promotionName = mysqli_real_escape_string($this->db->link, $promotionName);
        $promotionType =mysqli_real_escape_string($this->db->link, $promotionType);
        $promotionValue =mysqli_real_escape_string($this->db->link, $promotionValue);
        $startDate =mysqli_real_escape_string($this->db->link, $startDate);
        $endDate =mysqli_real_escape_string($this->db->link, $endDate);
       

      
 
        

        if (empty($promotionName)||empty($promotionType)||!isset($promotionValue)||empty($startDate) ||empty($endDate)) {
            $alert = "<span class='error'>Field must be not empty</span>";
            return $alert;
        } else {
            $query = "Update promotion set promotionName ='$promotionName',promotionType='$promotionType',promotionValue='$promotionValue',startDate='$startDate',endDate='$endDate' where PromotionID='$id' ";
            $result = $this->db->update($query);
            if($result){
                $alert ="<span class='success'>Update Promotion Successfully </span>";
                return $alert;

            }
            else{
                $alert ="<span class='error'>Update Promotion Not Success </span>";
                return $alert;
            }
           
        }

    }
    public function del_promotion($id){
        $query = "delete from promotion where PromotionID = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert ="<span class='success'> Deleted promotion Successfully </span>";
            return $alert;

        }
        else{
            $alert ="<span class='error'> Deleted promotion Not Success </span>";
            return $alert;
        }

    }
    public function get_promotionbyId($id){
        $query = "select *from promotion where PromotionID='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    
    
   
}
