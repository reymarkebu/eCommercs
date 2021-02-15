<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	
	public function index(){//User List
		$data['meta_title'] = $this->lang->line('index_heading');
		$data['domain_title'] = $this->lang->line('domain_title');

		$data['subview'] = "user_list";
		$this->load->view('backend/_layout_main',$data);
	}

	public function create_user(){
		$data['meta_title'] = $this->lang->line('create_user_heading');
		$data['domain_title'] = $this->lang->line('domain_title');

		$data['subview'] = "create_user";
		$this->load->view('backend/_layout_main',$data);
	}
}
