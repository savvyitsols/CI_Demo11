<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Cities_Model extends CI_Model implements IDao{

  public function exists($id){
    $query=$this->db->select('id')
                  ->where('id',$id)
                  ->from('tblcities')
                  ->get();
     return $query->num_rows > 0;
  }

  public function delete($id){
    $sql_query=$this->db->where('id', $uid)
                   ->delete('tblcities');

     if ($sql_query->num_rows > 0){
        return true
     }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id + ", to delete")
     }
  }

  public function get($id){
   $query=$this->db->select('cityName,id,lastUpdationDate')
                  ->where('id',$id)
                  ->from('tblcities')
                  ->get();

    if ($query->num_rows > 0){
      $cityDO = new CityDO()
      $cityDO->id = $query->row()->id;
      $cityDO->name = $query->row()->cityName;
      return $cityDO;
    }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id)
    }
  }

  public function getAll(){
    $query=$this->db->select('cityName,id')
                  ->from('tblcities')
                  ->get();

    if ($query->num_rows > 0){
      $data = array()
      while($row = $fetch_row()){
        $cityDO = new CityDO()
        $cityDO->id = $query->row()->id;
        $cityDO->name = $query->row()->cityName;
        array_push($data, $cityDO)
      }
      return $data
    }else{
      throw new NoDataFoundException("No Data Found for Cities")
    }
  }

}