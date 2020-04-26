<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class ManageUsers_Model extends CI_Model implements IDao{

  public function exists($id){
    $query=$this->db->select('id')
                  ->where('id',$id)
                  ->from('tblusers')
                  ->get();
     return $query->num_rows > 0;
  }

  public function delete($id){
    $sql_query=$this->db->where('id', $uid)
                   ->delete('tblusers');

     if ($sql_query->num_rows > 0){
        return true
     }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id + ", to delete")
     }
  }

  public function get($id){
   $query=$this->db->select('firstName,lastName,emailId,regDate,id,mobileNumber,lastUpdationDate')
                  ->where('id',$id)
                  ->from('tblusers')
                  ->get();

    if ($query->num_rows > 0){
      $userDO = new UserDO()
      $userDO->id = $query->row()->id;
      $userDO->name = $query->row()->firstName;
      $userDO->lastName = $query->row()->lastName;
      $userDO->mobileNumber = $query->row()->mobileNumber;
      return $userDO;
    }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id)
    }
  }

  public function getAll(){
    $query=$this->db->select('firstName,lastName,emailId,regDate,id')
                  ->from('tblusers')
                  ->get();

    if ($query->num_rows > 0){
      $data = array()
      while($row = $fetch_row()){
        $userDO = new UserDO()
        $userDO->id = $query->row()->id;
        $userDO->name = $query->row()->firstName;
        $userDO->lastName = $query->row()->lastName;
        $userDO->mobileNumber = $query->row()->mobileNumber;
        array_push($data, $userDO)
      }
      return $data
    }else{
      throw new NoDataFoundException("No Data Found for Users")
    }
  }

  // Delete below methods and use above once instead. DB connection, get, close taken care by Framework??

   public function getusersdetails(){
      $query=$this->db->select('firstName,lastName,emailId,regDate,id')
                    ->get('tblusers');
              return $query->result();      
   }

   //Getting particular user deatials on the basis of id 
    public function getuserdetail($uid){
      $ret=$this->db->select('firstName,lastName,emailId,regDate,id,mobileNumber,lastUpdationDate')
                    ->where('id',$uid)
                    ->get('tblusers');
                      return $ret->row();
    }

    // Function for use deletion
   public function deleteuser($uid){
      $sql_query=$this->db->where('id', $uid)
                   ->delete('tblusers');
   }

}