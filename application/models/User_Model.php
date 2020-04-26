<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Model extends CI_Model implements IDao{

  public function exists($id){
    throw new NoImplException("Impl if need")
  }

  public function getAll(){
    throw new NoImplException("Impl if need")
  }

  public function delete($id){
    throw new NoImplException("Impl if need")
  }

  public function get($userid){
  	throw new NoImplException("Impl if need")
  }

  public function upsert($userDO){
    $data = array(
                 'firstName' =>$userDO->name,
                 'lastName' => $userDO->lastName,
                 'mobileNumber' => $userDO->mobileNumber
              );

    $sql_query=$this->db->where('id', $userDO->id)
                  ->update('tblusers', $data); 
    
  }

}