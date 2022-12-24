<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

class manufacturer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_manufacturer($manufacturerName,$description)
    {
        $manufacturerName = $this->fm->validation($manufacturerName);
        $description =$this->fm->validation($description);
       

        $manufacturerName = mysqli_real_escape_string($this->db->link, $manufacturerName);
        $description = mysqli_real_escape_string($this->db->link, $description);
 
        

        if (empty($manufacturerName)||empty($description)) {
            $alert = "<span class='error'>Name and description must be not empty</span>";
            return $alert;
        } else {
            $query = "insert into manufacturer(manufacturerName,description) values('$manufacturerName','$description')";
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='success'>Insert Manufacturer Successfully </span>";
                return $alert;

            }
            else{
                $alert ="<span class='error'>Insert Manufacturer Not Success </span>";
                return $alert;
            }
           
        }
    }
    public function show_manufacturer(){
        $query = "select *from manufacturer order by manufacturerID";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_manufacturer_limit(){
        $query = "select *from manufacturer order by manufacturerID limit 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_manufacturer($manufacturerName,$description,$id){
        $manufacturerName = $this->fm->validation($manufacturerName);
        $description =$this->fm->validation($description);
       

        $manufacturerName = mysqli_real_escape_string($this->db->link, $manufacturerName);
        $description = mysqli_real_escape_string($this->db->link, $description);
        $id = mysqli_real_escape_string($this->db->link, $id);
 
        

        if (empty($manufacturerName)||empty($description)) {
            $alert = "<span class='error'>Name and description must be not empty</span>";
            return $alert;
        } else {
            $query = "Update manufacturer set manufacturerName ='$manufacturerName',description='$description'where ManufacturerID='$id' ";
            $result = $this->db->update($query);
            if($result){
                $alert ="<span class='success'>Update Manufacturer Successfully </span>";
                return $alert;

            }
            else{
                $alert ="<span class='error'>Update Manufacturer Not Success </span>";
                return $alert;
            }
           
        }

    }
    public function del_manufacturer($id){
        $query = "delete from manufacturer where manufacturerID = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert ="<span class='success'>Update Deleted Successfully </span>";
            return $alert;

        }
        else{
            $alert ="<span class='error'>Update Deleted Not Success </span>";
            return $alert;
        }

    }
    public function getmanufacturerbyId($id){
        $query = "select *from manufacturer where ManufacturerID='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    
   
}
