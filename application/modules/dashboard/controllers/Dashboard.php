<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct(){
      parent::__construct();
      if (!$this->ion_auth->logged_in()) {redirect('login');}

      $this->data['module_title'] = 'Dashboard';
      // $this->load->model('Dashboard_model');
      // $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
   }

   public function index() {
      // $this->data['dashboard_info'] = $this->Dashboard_model->administrator_dashboard();
      // Load View
      $this->data['meta_title'] = 'Dashboard';
      $this->data['subview'] = 'administrator_dashboard';
      $this->load->view('backend/_layout_main', $this->data);      
      
   }
}
