<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->data['module_title'] = 'Homepage';
   }

   function homepages($id){
      // Load View
      $this->data['meta_title'] = 'Homepage';
      if($id == 1) {
        $this->data['subview'] = 'homepage/homepage1';
      } 
      elseif($id == 2) {
        $this->data['subview'] = 'homepage/homepage2';
      } elseif($id == 3) {
        $this->data['subview'] = 'homepage/homepage3';
      } else {
         // default page 
      }
      
      $this->load->view('frontend/_layout_main', $this->data);
   }
}
