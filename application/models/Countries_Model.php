<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Countries_Model extends CI_Model implements IDao{

  public function exists($id){
    $query=$this->db->select('id')
                  ->where('id',$id)
                  ->from('tblcountries')
                  ->get();
     return $query->num_rows > 0;
  }

  public function delete($id){
    $sql_query=$this->db->where('id', $uid)
                   ->delete('tblcountries');

     if ($sql_query->num_rows > 0){
        return true
     }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id + ", to delete")
     }
  }

  public function get($id){
   $query=$this->db->select('countryName,id,lastUpdationDate')
                  ->where('id',$id)
                  ->from('tblcountries')
                  ->get();

    if ($query->num_rows > 0){
      $countryDO = new CountryDO()
      $countryDO->id = $query->row()->id;
      $countryDO->name = $query->row()->countryName;
      return $countryDO;
    }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id)
    }
  }

  public function getAll(){
    $query=$this->db->select('countryName,id')
                  ->from('tblcountries')
                  ->get();

    if ($query->num_rows > 0){
      $data = array()
      while($row = $fetch_row()){
        $countryDO = new CountryDO()
        $countryDO->id = $query->row()->id;
        $countryDO->name = $query->row()->countryName;
        array_push($data, $countryDO)
      }
      return $data
    }else{
      throw new NoDataFoundException("No Data Found for Counties")
    }
  }

}