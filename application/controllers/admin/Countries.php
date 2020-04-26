<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Countries extends CI_Controller {
   function __construct(){
      parent::__construct();
      if(! $this->session->userdata('adid'))
      redirect('admin/login');
   }

   public function index(){
      $this->load->model('Countries_Model');
      $countries=$this->Countries_Model->getAll();
      $this->load->view('admin/manage_countries',['countriesDetails'=>$countries]);
   }

   // For particular Record
   public function get($id)
   {
      $this->load->model('Countries_Model');
      $country=$this->Countries_Model->get($id);
      $this->load->view('admin/countrydetails',['countryDetails'=>$country]);
   }

   public function delete($id)
   {
      $this->load->model('Countries_Model');
      $this->Countries_Model->delete($id);
      $this->session->set_flashdata('success', 'Country data deleted');
      redirect('admin/manage_countries');
   }

   public function add()
   {
      $userDO->id = $this->session->userdata('uid');

      $countryDO->id = 1 //Generate next Id??
      $countryDO->name = $this->input->post('countryName');

      $this->load->model('Countries_Model');
      $this->Countries_Model->upsert($countryDO);
      $this->session->set_flashdata('success', 'Country data added');
      redirect('admin/manage_countries');
   }

   public function update($id)
   {
      $userDO->id = $this->session->userdata('uid');

      $countryDO->id = $this->input->post('id');
      $countryDO->name = $this->input->post('countryName');

      $this->load->model('Countries_Model');
      $this->Countries_Model->upsert($countryDO);
      $this->session->set_flashdata('success', 'Country data updated');
      redirect('admin/manage_countries');
   }

}