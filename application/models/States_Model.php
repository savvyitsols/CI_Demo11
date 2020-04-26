<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class States_Model extends CI_Model implements IDao{

  public function exists($id){
    $query=$this->db->select('id')
                  ->where('id',$id)
                  ->from('tblstates')
                  ->get();
     return $query->num_rows > 0;
  }

  public function delete($id){
    $sql_query=$this->db->where('id', $uid)
                   ->delete('tblstates');

     if ($sql_query->num_rows > 0){
        return true
     }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id + ", to delete")
     }
  }

  public function get($id){
   $query=$this->db->select('stateName,id,lastUpdationDate')
                  ->where('id',$id)
                  ->from('tblstates')
                  ->get();

    if ($query->num_rows > 0){
      $stateDO = new StateDO()
      $stateDO->id = $query->row()->id;
      $stateDO->name = $query->row()->stateName;
      return $stateDO;
    }else{
      throw new NoDataFoundException("No Data Found for give id: " + $id)
    }
  }

  public function getAll(){
    $query=$this->db->select('stateName,id')
                  ->from('tblstates')
                  ->get();

    if ($query->num_rows > 0){
      $data = array()
      while($row = $fetch_row()){
        $stateDO = new StateDO()
        $stateDO->id = $query->row()->id;
        $stateDO->name = $query->row()->stateName;
        array_push($data, $stateDO)
      }
      return $data
    }else{
      throw new NoDataFoundException("No Data Found for States")
    }
  }

}