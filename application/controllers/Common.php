<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Backend_Controller {

   public function __construct(){
      parent::__construct();
      if (!$this->ion_auth->logged_in()):
         redirect('login');
      endif;
   }

   public function ajax_get_category_by_brand($brand_id){
      header('Content-Type: application/x-json; charset=utf-8');
      echo (json_encode($this->Common_model->get_category_by_brand($brand_id)));
   }

   public function ajax_get_sub_category_by_cat($cat_id){
      header('Content-Type: application/x-json; charset=utf-8');
      echo (json_encode($this->Common_model->get_sub_category_by_cat($cat_id)));
   }

}