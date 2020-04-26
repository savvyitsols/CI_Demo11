<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_States extends CI_Controller {
   function __construct(){
      parent::__construct();
      if(! $this->session->userdata('adid'))
      redirect('admin/login');
   }

   public function index(){
      $this->load->model('States_Model');
      $states=$this->States_Model->getAll();
      $this->load->view('admin/manage_states',['statesDetails'=>$states]);
   }

   // For particular Record
   public function get($id)
   {
      $this->load->model('States_Model');
      $country=$this->States_Model->get($id);
      $this->load->view('admin/countrydetails',['countryDetails'=>$country]);
   }

   public function delete($id)
   {
      $this->load->model('States_Model');
      $this->States_Model->delete($id);
      $this->session->set_flashdata('success', 'State data deleted');
      redirect('admin/manage_states');
   }

   public function add()
   {
      $userDO->id = $this->session->userdata('uid');

      $stateDO->id = 1 //Generate next Id??
      $stateDO->name = $this->input->post('stateName');

      $this->load->model('States_Model');
      $this->States_Model->upsert($stateDO);
      $this->session->set_flashdata('success', 'State data added');
      redirect('admin/manage_states');
   }

   public function update($id)
   {
      $userDO->id = $this->session->userdata('uid');

      $stateDO->id = $this->input->post('id');
      $stateDO->name = $this->input->post('stateName');

      $this->load->model('States_Model');
      $this->States_Model->upsert($stateDO);
      $this->session->set_flashdata('success', 'State data updated');
      redirect('admin/manage_states');
   }

}