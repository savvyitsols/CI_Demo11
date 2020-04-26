<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Cities extends CI_Controller {
   function __construct(){
      parent::__construct();
      if(! $this->session->userdata('adid'))
      redirect('admin/login');
   }

   public function index(){
      $this->load->model('Cities_Model');
      $cities=$this->Cities_Model->getAll();
      $this->load->view('admin/manage_cities',['citiesDetails'=>$cities]);
   }

   // For particular Record
   public function get($id)
   {
      $this->load->model('Cities_Model');
      $city=$this->Cities_Model->get($id);
      $this->load->view('admin/citydetails',['cityDetails'=>$city]);
   }

   public function delete($id)
   {
      $this->load->model('Cities_Model');
      $this->Cities_Model->delete($id);
      $this->session->set_flashdata('success', 'City data deleted');
      redirect('admin/manage_cities');
   }

   public function add()
   {
      $userDO->id = $this->session->userdata('uid');

      $cityDO->id = 1 //Generate next Id??
      $cityDO->name = $this->input->post('cityName');

      $this->load->model('Cities_Model');
      $this->Cities_Model->upsert($cityDO);
      $this->session->set_flashdata('success', 'City data added');
      redirect('admin/manage_cities');
   }

   public function update($id)
   {
      $userDO->id = $this->session->userdata('uid');

      $cityDO->id = $this->input->post('id');
      $cityDO->name = $this->input->post('cityName');

      $this->load->model('Cities_Model');
      $this->Cities_Model->upsert($cityDO);
      $this->session->set_flashdata('success', 'City data updated');
      redirect('admin/manage_cities');
   }

}