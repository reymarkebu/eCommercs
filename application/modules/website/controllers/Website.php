<?php defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct() {
		parent::__construct();
      $this->data['module_title'] = 'Website';
      $this->load->model('Website_model');
   }

   function index(){
      $this->data['brands'] = $this->Common_model->get_data('brand');
      // print_r($this->data['brands']);exit();
      // Load View
      $this->data['meta_title'] = 'Website';
      $this->data['subview'] = 'index';
      // $this->data['subview'] = 'brand_details';
      $this->load->view('frontend/_layout_main', $this->data);
   }

   public function search_details() {
    $brand_name = $this->input->post('searchtext');
    $brand_name = urldecode($brand_name);
    $this->data['brand_name'] = $brand_name;
    // Menu Info
    $this->data['products'] = $this->Website_model->products();
    // Body Information
    $this->data['categorys'] = $this->Website_model->categorys($brand_name);
    if($this->data['categorys']) {
        // Load View
        $this->data['subview'] = 'brand_details';
        $this->load->view('frontend/_layout_main', $this->data);
    } else {
        $this->data['brands'] = $this->Common_model->get_data('brand');
        $this->data['meta_title'] = 'Website';
        $this->data['subview'] = 'search_details';
        $this->load->view('frontend/_layout_main', $this->data);
    }
    
   }

   public function brand_details($brand_name){
      $brand_name = urldecode($brand_name);
      $this->data['brand_name'] = $brand_name;
      // Menu Info
      $this->data['products'] = $this->Website_model->products();
      // Body Information
      $this->data['categorys'] = $this->Website_model->categorys($brand_name);
      // Load View
      // $this->data['meta_title'] = 'Website';
      $this->data['subview'] = 'brand_details';
      $this->load->view('frontend/_layout_main', $this->data);
   }

   public function category_details($brand_name,$category_name){//category
      $brand_name = urldecode($brand_name);
      $category_name = urldecode($category_name);

      $this->data['brand_name'] = $brand_name;
      $this->data['category_name'] = $category_name;
      // Menu Info
      $this->data['products'] = $this->Website_model->products();
      // Body Information
      $this->data['sub_categorys'] = $this->Website_model->sub_categorys($brand_name,$category_name);
      // print_r($this->data['sub_categorys']);exit();
      // Load View
      // $this->data['meta_title'] = 'Website';
      $this->data['subview'] = 'category_details';
      $this->load->view('frontend/_layout_main', $this->data);
   }


   public function sub_category_details($brand_name,$category_name,$sub_category_name){
      $brand_name = urldecode($brand_name);
      $category_name = urldecode($category_name);
      $sub_category_name = urldecode($sub_category_name);

      $this->data['brand_name'] = $brand_name;
      $this->data['category_name'] = $category_name;
      $this->data['sub_category_name'] = $sub_category_name;
      // exit(urldecode($sub_category_name));
      // Menu Info
      $this->data['products'] = $this->Website_model->products();
      // Body Information
      $this->data['items'] = $this->Website_model->items($brand_name,$category_name,$sub_category_name);
      // Load View
      // $this->data['meta_title'] = 'Website';
      $this->data['subview'] = 'sub_category_details';
      $this->load->view('frontend/_layout_main', $this->data);
   }

   public function item_details($brand_name,$category_name,$sub_category_name,$item_model_no){
      $brand_name = urldecode($brand_name);
      $category_name = urldecode($category_name);
      $sub_category_name = urldecode($sub_category_name);
      $item_model_no = urldecode($item_model_no);
      
      $this->data['brand_name'] = $brand_name;
      $this->data['category_name'] = $category_name;
      $this->data['sub_category_name'] = $sub_category_name;
      $this->data['item_model_no'] = $item_model_no;
      // Menu Info
      $this->data['products'] = $this->Website_model->products();
      // Body Information
      $this->data['item_info'] = $this->Website_model->item_details($item_model_no);
      // $this->data['item_details'] = $this->Common_model->getWhere('item', $item_model_no, 'model_no');
      // Load View
      // echo "<pre>";
      // print_r($this->data['item_info']);exit();
      $this->data['subview'] = 'item_details';
      $this->load->view('frontend/_layout_main', $this->data);
   }
}
