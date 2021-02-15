<?php defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->load->model('Common_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning"> <i class="fa fa-warning"></i> ', '</div>');

   		$this->data['domain_title'] = $this->lang->line('domain_title');
        $this->data['module_title'] = 'Settings';
    }

    /****************************** Brand Start********************************/
    /************************************************************************/  
    public function brand(){
        $this->data['results'] = $this->Common_model->get_data('brand');

   		$this->data['meta_title'] = 'Brand';
   		$this->data['subview'] = 'brand/all';
   		$this->load->view('backend/_layout_main', $this->data);
    }

    public function brand_add(){
        $this->form_validation->set_rules('name', 'Brand Name', 'required|trim');

        // if(@$_FILES['img_file']['size'] > 0){
        //     $this->form_validation->set_rules('img_file', '', 'callback_file_check');
        // }

        if ($this->form_validation->run() == true) {
            $form_data = array( 'brand_name' => $this->input->post('name'),'status' => 1, 'created' => date('Y-m-d H:i:s') );
            // Passport
            $img_path = 'uploads/brand_image/';
            if($_FILES["img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('img_file')){
                    $data_up = $this->upload->data();
                    $form_data['brand_img'] = $data_up["file_name"];
                }
            }

            if ($this->Common_model->save('brand', $form_data)) {
                $this->session->set_flashdata('success', 'Brand create successfully.');
                redirect('settings/brand');
            }
        }

        // // Load page
        $this->data['meta_title'] = 'Create Brand';
        $this->data['subview'] = 'brand/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function brand_edit($id){
        // CI Validation
        $this->form_validation->set_rules('name', 'Brand Name', 'required|trim');
        if ($this->form_validation->run() == true) {
            $form_data = array( 'brand_name' => $this->input->post('name'), 'updated' => date('Y-m-d H:i:s') );
            // Brand Image
            $img_path = 'uploads/brand_image/';
            if($_FILES["img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('img_file')){
                    $data_up = $this->upload->data();
                    $form_data['brand_img'] = $data_up["file_name"];

                    @unlink($img_path.$this->input->post('old_img_file'));
                }
            }

            if ($this->Common_model->edit('brand', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Brand create successfully.');
                redirect('settings/brand');
            }
        }
        //Result
        $this->data['info'] = $this->Common_model->getWhere('brand', $id, 'id');
        // Load page
        $this->data['meta_title'] = 'Edit Brand';
        $this->data['subview'] = 'brand/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function brand_delete($id){
        $brand_img = $this->Common_model->getWhere('brand', $id, 'id')->brand_img;
        $img_path = 'uploads/brand_image/';
        if($this->Common_model->delete('brand', 'id', $id)){
            @unlink($img_path.$brand_img);
            $this->session->set_flashdata('success', 'Information delete successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
        }
        redirect('settings/brand');
    }
    /*Brand End*/

    /****************************** Product Category********************************/
    /************************************************************************/  
    public function product_category(){
        $this->data['results'] = $this->Settings_model->getCategoryData();

        $this->data['meta_title'] = 'Product Category';
        $this->data['subview'] = 'category/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_category_add(){
       // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_name' => $this->input->post('category_name')
            );

            $img_path = 'uploads/category_image/';
            if($_FILES["category_img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('category_img_file')){
                    $data_up = $this->upload->data();
                    $form_data['category_img'] = $data_up["file_name"];
                }
            }

            if ($this->Common_model->save('product_category', $form_data)) {
                $this->session->set_flashdata('success', 'Data Inserted Successfully.');
                redirect('settings/product_category');
            }
        }

        //Dropdown
        $this->data['brands'] = $this->Common_model->get_brand_dropdown(); 

        // Load page
        $this->data['meta_title'] = 'Create Product Category';
        $this->data['subview'] = 'category/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_category_edit($id){
        // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        // $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_name' => $this->input->post('category_name')
            );

            $img_path = 'uploads/category_image/';
            if($_FILES["category_img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('category_img_file')){
                    $data_up = $this->upload->data();
                    $form_data['category_img'] = $data_up["file_name"];

                    @unlink($img_path.$this->input->post('old_img_file'));
                }
            }

            // print_r($form_data); exit;
            if ($this->Common_model->edit('product_category', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/product_category');
            }
        }
        //Result
        $this->data['info'] = $this->Common_model->getWhere('product_category',$id,'id');
        //Dropdown
        $this->data['brands']    = $this->Common_model->get_brand_dropdown();
        $this->data['categorys'] = $this->Common_model->get_category_dropdown('product_category');
        // Load page
        $this->data['meta_title'] = 'Edit Product Category';
        $this->data['subview'] = 'category/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_category_delete($id){
        $category_img = $this->Common_model->getWhere('product_category', $id, 'id')->category_img;
        $img_path = 'uploads/category_image/';
        if($this->Common_model->delete('product_category', 'id', $id)){
            @unlink($img_path.$category_img);
            $this->session->set_flashdata('success', 'Information delete successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
        }
        redirect('settings/product_category');
    }
    /****************************** Product Sub Category********************************/
    /************************************************************************/  
    public function product_sub_category(){
        $this->data['results'] = $this->Settings_model->getSubCategoryData();

        $this->data['meta_title'] = 'Product Sub Category';
        $this->data['subview'] = 'sub_category/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_sub_category_add(){
       // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_id' => $this->input->post('category_name'),
                'sub_category_name' => $this->input->post('sub_category_name')
            );

            $img_path = 'uploads/sub_category_image/';
            if($_FILES["sub_category_img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('sub_category_img_file')){
                    $data_up = $this->upload->data();
                    $form_data['sub_category_img'] = $data_up["file_name"];
                }
            }

            if ($this->Common_model->save('product_sub_category', $form_data)) {
                $this->session->set_flashdata('success', 'Data Inserted Successfully.');
                redirect('settings/product_sub_category');
            }
        }

        //Dropdown
        $this->data['brands'] = $this->Common_model->get_brand_dropdown(); 

        // Load page
        $this->data['meta_title'] = 'Create Product Sub Category';
        $this->data['subview'] = 'sub_category/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_sub_category_edit($id){
        // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_id' => $this->input->post('category_name'),
                'sub_category_name' => $this->input->post('sub_category_name')
            );

            $img_path = 'uploads/sub_category_image/';
            if($_FILES["sub_category_img_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('sub_category_img_file')){
                    $data_up = $this->upload->data();
                    $form_data['sub_category_img'] = $data_up["file_name"];

                    @unlink($img_path.$this->input->post('old_img_file'));
                }
            }

            // print_r($form_data); exit;
            if ($this->Common_model->edit('product_sub_category', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/product_sub_category');
            }
        }
        //Result
        $this->data['info'] = $this->Common_model->getWhere('product_sub_category',$id,'id');
        //Dropdown
        $this->data['brands']    = $this->Common_model->get_brand_dropdown();
        $this->data['categorys'] = $this->Common_model->get_category_dropdown('product_category');
        // Load page
        $this->data['meta_title'] = 'Edit Product Sub Category';
        $this->data['subview'] = 'sub_category/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function product_sub_category_delete($id){
        $sub_category_img = $this->Common_model->getWhere('product_sub_category', $id, 'id')->sub_category_img;
        $img_path = 'uploads/sub_category_image/';
        if($this->Common_model->delete('product_sub_category', 'id', $id)){
            @unlink($img_path.$sub_category_img);
            $this->session->set_flashdata('success', 'Information delete successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
        }
        redirect('settings/product_sub_category');
    }

    /****************************** Product Sub Category********************************/
    /************************************************************************/  
    public function item(){
        $this->data['results'] = $this->Settings_model->getitemData();

        $this->data['meta_title'] = 'Item';
        $this->data['subview'] = 'item/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function item_add(){
       // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('model_no', 'Model No.', 'required|trim');
        $this->form_validation->set_rules('technical_specification', 'Technical Specification', 'trim');
        $this->form_validation->set_rules('other_details', 'Other Details', 'trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_id' => $this->input->post('category_name'),
                'sub_category_id' => $this->input->post('sub_category_name'),
                'model_no' => $this->input->post('model_no'),
                'technical_specification' => $this->input->post('technical_specification'),
                'other_details' => $this->input->post('other_details'),
                'status' => 1,
                'created' => date('Y-m-d H:i:s')
            );

            $img_path = 'uploads/item_image/';
            if($_FILES["pdf_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('pdf_file')){
                    $data_up = $this->upload->data();
                    $form_data['pdf_file'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img1"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img1')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img1'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img2"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img2')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img2'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img3"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img3')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img3'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img4"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img4')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img4'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img5"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img5')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img5'] = $data_up["file_name"];
                }
            }
            // if($_FILES["slider_img"]["name"] != ''){
            //     $config['upload_path'] = $img_path;
            //     $config['allowed_types'] = 'gif|jpg|jpeg|png';
            //     $config['max_size'] = '204800';
            //     $config['max_width']  = '6000';
            //     $config['max_height']  = '6000';

            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
        
            //     if ($this->upload->do_upload('slider_img')){
            //         $data_up = $this->upload->data();
            //         $form_data['slider_img'] = $data_up["file_name"];
            //     }
            // }

            if ($this->Common_model->save('item', $form_data)) {
                $this->session->set_flashdata('success', 'Data Inserted Successfully.');
                redirect('settings/item');
            }
        }

        //Dropdown
        $this->data['brands'] = $this->Common_model->get_brand_dropdown(); 

        // Load page
        $this->data['meta_title'] = 'Create Item';
        $this->data['subview'] = 'item/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function item_edit($id){
       // CI Validation
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|trim');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('model_no', 'Model No.', 'required|trim');
        $this->form_validation->set_rules('technical_specification', 'Technical Specification', 'trim');
        $this->form_validation->set_rules('other_details', 'Other Details', 'trim');

        if ($this->form_validation->run() == true) {
            $form_data = array(
                'brand_id' => $this->input->post('brand_name'),
                'category_id' => $this->input->post('category_name'),
                'sub_category_id' => $this->input->post('sub_category_name'),
                'model_no' => $this->input->post('model_no'),
                'technical_specification' => $this->input->post('technical_specification'),
                'other_details' => $this->input->post('other_details'),
                'status' => 1,
                'created' => date('Y-m-d H:i:s')
            );

            $img_path = 'uploads/item_image/';
            if($_FILES["pdf_file"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('pdf_file')){
                    $data_up = $this->upload->data();
                    $form_data['pdf_file'] = $data_up["file_name"];
                    @unlink($img_path.$this->input->post('old_pdf_file'));
                }
            }

            // if($_FILES["slider_img"]["name"] != ''){
            //     $config['upload_path'] = $img_path;
            //     $config['allowed_types'] = 'gif|jpg|jpeg|png';
            //     $config['max_size'] = '204800';
            //     $config['max_width']  = '6000';
            //     $config['max_height']  = '6000';

            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
        
            //     if ($this->upload->do_upload('slider_img')){
            //         $data_up = $this->upload->data();
            //         $form_data['slider_img'] = $data_up["file_name"];
            //         @unlink($img_path.$this->input->post('old_slider_img'));
            //     }
            // }
            if($_FILES["slider_img1"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img1')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img1'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img2"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img2')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img2'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img3"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img3')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img3'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img4"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img4')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img4'] = $data_up["file_name"];
                }
            }
            if($_FILES["slider_img5"]["name"] != ''){
                $config['upload_path'] = $img_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '204800';
                $config['max_width']  = '6000';
                $config['max_height']  = '6000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('slider_img5')){
                    $data_up = $this->upload->data();
                    $form_data['slider_img5'] = $data_up["file_name"];
                }
            }
            if ($this->Common_model->edit('item', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/item');
            }
        }
        //Result
        $this->data['info'] = $this->Common_model->getWhere('item',$id,'id');
        $brand_id = $this->data['info']->brand_id;
        $category_id = $this->data['info']->category_id;
        // print_r($this->data['info']);exit();
        //Dropdown
        $this->data['brands']    = $this->Common_model->getDropdownData('brand','brand_name');
        $this->data['categorys'] = $this->Common_model->getDropdownData('product_category','category_name',$brand_id,'brand_id');
        $this->data['sub_categorys'] = $this->Common_model->getDropdownData('product_sub_category','sub_category_name',$category_id,'category_id');

        // Load page
        $this->data['meta_title'] = 'Edit Item';
        $this->data['subview'] = 'item/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function item_delete($id){
        $item = $this->Common_model->getWhere('item', $id, 'id');
        $img_path = 'uploads/item_image/';
        if($this->Common_model->delete('item', 'id', $id)){
            @unlink($img_path.$item->pdf_file);
            @unlink($img_path.$item->slider_img);
            $this->session->set_flashdata('success', 'Information delete successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
        }
        redirect('settings/item');
    }
    /****************************** District ********************************/
    /************************************************************************/    
    public function district(){

        $this->data['results'] = $this->Settings_model->get_district_list();
           // echo "<pre>";
           // print_r($this->data['results']); exit;

        // Load page
        $this->data['meta_title'] = 'District List';
        $this->data['subview'] = 'district/all';
        $this->load->view('backend/_layout_main', $this->data);
    }

    /****************************** Upazila ********************************/
    /************************************************************************/  

    public function upazila_thana($offset=0){
      //pagination
      //$limit = 25;
      $limit = 1000;
      $results = $this->Settings_model->get_upa_tha_list($limit, $offset); 
        // print_r($this->data['results']); exit;\
      $this->data['results'] = $results['rows'];
      $this->data['total_rows'] = $results['num_rows'];

      //pagination
      $this->data['pagination'] = create_pagination('settings/upazila_thana/', $this->data['total_rows'], $limit, 4, $full_tag_wrap = true);
      // Load page
      $this->data['meta_title'] = 'Police Station List';
      $this->data['subview'] = 'upazila/all';
      $this->load->view('backend/_layout_main', $this->data);
    }

    public function archive_center()
    {
        $this->data['centers'] = $this->db->get('archive_center')->result_array();
        $this->data['meta_title'] = $this->lang->line('edit_group_title');
        $this->data['domain_title'] = $this->lang->line('domain_title');
        $this->data['subview'] = 'archive/archive_center';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function index()
    {
        redirect('settings/upazila_thana');
    }


    public function district_add(){
        $this->form_validation->set_rules('division', 'Division', 'required|trim');
        $this->form_validation->set_rules('district_name', 'District Name', 'required|trim');
        $this->form_validation->set_rules('district_name_bn', 'District Name Bangla', 'trim');
        $this->form_validation->set_rules('district_geo', 'GEO Code', 'min_length[2]|max_length[2]|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'div_id' => $this->input->post('division'),
                'district_name' => $this->input->post('district_name'),
                'district_name_bn' => $this->input->post('district_name_bn'),
                'district_geo' => $this->input->post('district_geo') ? $this->input->post('district_geo') : null,
            );

            // print_r($form_data); exit;
            if ($this->Common_model->save('district', $form_data)) {
                $this->session->set_flashdata('success', 'District create successfully.');
                redirect('general_setting/district');
            }
        }

        $this->data['division'] = $this->Common_model->get_data('divisions');

        // Load page
        $this->data['meta_title'] = 'Create District';
        $this->data['subview'] = 'district_add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function district_edit($id)
    {
        $this->form_validation->set_rules('division', 'Division', 'required|trim');
        $this->form_validation->set_rules('district_name', 'District Name', 'required|trim');
        $this->form_validation->set_rules('district_name_bn', 'District Name Bangla', 'trim');
        $this->form_validation->set_rules('district_geo', 'GEO Code', 'min_length[2]|max_length[2]|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'div_id' => $this->input->post('division'),
                'district_name' => $this->input->post('district_name'),
                'district_name_bn' => $this->input->post('district_name_bn'),
                'district_geo' => $this->input->post('district_geo') ? $this->input->post('district_geo') : null,
                'status' => $this->input->post('status'),
            );

            // print_r($form_data); exit;
            if ($this->Common_model->edit('district', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('general_setting/district');
            }
        }

        $this->data['info'] = $this->Settings_model->get_info('district', $id);
        $this->data['division'] = $this->Common_model->get_dropdown('division', 'div_name', 'id');

        // Load page
        $this->data['meta_title'] = 'Edit District';
        $this->data['subview'] = 'district_edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function district_delete($id)
    {
        $form_data = array(
            'is_delete' => 1,
        );
        $this->data['info'] = $this->Common_model->edit('district', $id, 'id', $form_data);
        $this->session->set_flashdata('success', 'Information delete successfully.');
        redirect('general_setting/district');
    }

    /****************************** Police Station ********************************/
    /************************************************************************/  
    public function police_stations()
    {
         //$this->data['results'] = $this->Common_model->getAllData('divisions');
         
         $this->data['results'] = $this->Common_model->get_data('police_stations'); 
         // print_r($this->data['results']); exit;
         // $this->data['users'] = $this->manage_model->users();
         $this->data['meta_title'] = 'Police Stations';//$this->lang->line('edit_group_title');
         $this->data['domain_title'] = $this->lang->line('domain_title');
         $this->data['subview'] = 'police_stations/all';
         $this->load->view('backend/_layout_main', $this->data);
    }

    public function police_station_add()
    {
       // CI Validation
        $this->form_validation->set_rules('name_en', 'Police Station Name English', 'required|trim');
        $this->form_validation->set_rules('name_bn', 'Police Station Name Bangla', 'required|trim');
        $this->form_validation->set_rules('per_division_id', 'Division Name', 'required|trim');
        $this->form_validation->set_rules('per_district_id', 'District Name', 'required|trim');
        $this->form_validation->set_rules('per_upa_tha_id', 'Upazila Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'name_bn' => $this->input->post('name_bn'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            if ($this->Common_model->save('police_stations', $form_data)) {
               //print_r($form_data);exit();
                $this->session->set_flashdata('success', 'Police station create successfully.');
                redirect('settings/police_stations');
            }
        }

        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division(); 

        // // Load page
        $this->data['meta_title'] = 'Create Police Station';
        $this->data['subview'] = 'police_stations/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function police_station_edit($id)
    {
        // CI Validation
        $this->form_validation->set_rules('name_en', 'Police Station Name English', 'required|trim');
        $this->form_validation->set_rules('name_bn', 'Police Station Name Bangla', 'required|trim');
        $this->form_validation->set_rules('per_division_id', 'Division Name', 'required|trim');
        $this->form_validation->set_rules('per_district_id', 'District Name', 'required|trim');
        $this->form_validation->set_rules('per_upa_tha_id', 'Upazila Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'name_bn' => $this->input->post('name_bn'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            // print_r($form_data); exit;
            if ($this->Common_model->edit('police_stations', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/police_stations');
            }
        }
        //Result
        $this->data['info'] = $this->Settings_model->get_info_police_stations($id);
        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division();
        $this->data['districts'] = $this->Common_model->get_district();  
        $this->data['upazilas'] = $this->Common_model->get_upazila();  
        // Load page
        $this->data['meta_title'] = 'Edit Police Station';
        $this->data['subview'] = 'police_stations/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function police_station_delete($id)
    {
        if($this->Settings_model->get_police_stations_delete($id)){
            $this->session->set_flashdata('success', 'Information delete successfully');
            redirect('settings/police_stations');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
            redirect('settings/police_stations');
        }

    }

    /****************************** Sub Register Office ********************************/
    /************************************************************************/  
    public function sub_register_office()
    {
         //$this->data['results'] = $this->Common_model->getAllData('divisions');
         
         $this->data['results'] = $this->Settings_model->get_sub_register_office(); 
         // print_r($this->data['results']); exit;
         // $this->data['users'] = $this->manage_model->users();
         $this->data['meta_title'] = 'Sub Register Office';//$this->lang->line('edit_group_title');
         $this->data['domain_title'] = $this->lang->line('domain_title');
         $this->data['subview'] = 'sub_register_office/all';
         $this->load->view('backend/_layout_main', $this->data);
    }

    public function sub_register_office_add()
    {
       // CI Validation
        $this->form_validation->set_rules('name_en', 'Sub Register Office Name English', 'required|trim');
        $this->form_validation->set_rules('name_bn', 'Sub Register Office Name Bangla', 'required|trim');
        $this->form_validation->set_rules('per_division_id', 'Division Name', 'required|trim');
        $this->form_validation->set_rules('per_district_id', 'District Name', 'required|trim');
        $this->form_validation->set_rules('per_upa_tha_id', 'Upazila Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'name_bn' => $this->input->post('name_bn'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            if ($this->Common_model->save('sub_register_office', $form_data)) {
               // print_r($form_data);exit();
                $this->session->set_flashdata('success', 'Sub Register Office create successfully.');
                redirect('settings/sub_register_office');
            }
        }

        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division(); 

        // // Load page
        $this->data['meta_title'] = 'Create Sub Register Office';
        $this->data['subview'] = 'sub_register_office/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function sub_register_office_edit($id)
    {
        // CI Validation
        $this->form_validation->set_rules('name_en', 'Sub Register Office Name English', 'required|trim');
        $this->form_validation->set_rules('name_bn', 'Sub Register Office Name Bangla', 'required|trim');
        $this->form_validation->set_rules('per_division_id', 'Division Name', 'required|trim');
        $this->form_validation->set_rules('per_district_id', 'District Name', 'required|trim');
        $this->form_validation->set_rules('per_upa_tha_id', 'Upazila Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'name_bn' => $this->input->post('name_bn'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            // print_r($form_data); exit;
            if ($this->Common_model->edit('sub_register_office', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/sub_register_office');
            }
        }
        //Result
        $this->data['info'] = $this->Settings_model->get_info_sub_register_office($id);
        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division();
        $this->data['districts'] = $this->Common_model->get_district();  
        $this->data['upazilas'] = $this->Common_model->get_upazila();  
        // Load page
        $this->data['meta_title'] = 'Edit Sub Register Office';
        $this->data['subview'] = 'sub_register_office/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function sub_register_office_delete($id)
    {
        if($this->Settings_model->get_sub_register_office_delete($id)){
            $this->session->set_flashdata('success', 'Information delete successfully');
            redirect('settings/sub_register_office');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
            redirect('settings/sub_register_office');
        }

    }

    /****************************** Mouza ********************************/
    /************************************************************************/  
    public function mouza()
    {
         //$this->data['results'] = $this->Common_model->getAllData('divisions');
         
         $this->data['results'] = $this->Settings_model->get_mouza();
         // print_r($this->data['results']); exit;
         // $this->data['users'] = $this->manage_model->users();
         $this->data['meta_title'] = 'mouza';
         //$this->lang->line('edit_group_title');
         $this->data['domain_title'] = $this->lang->line('domain_title');
         $this->data['subview'] = 'mouza/all';
         $this->load->view('backend/_layout_main', $this->data);
    }

    public function mouza_add()
    {
       // CI Validation
        $this->form_validation->set_rules('name_en', 'Mouza Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'no_en' => $this->input->post('no_en'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            if ($this->Common_model->save('mouza', $form_data)) {
               // print_r($form_data);exit();
                $this->session->set_flashdata('success', 'Mouza create successfully.');
                redirect('settings/mouza');
            }
        }

        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division(); 

        // // Load page
        $this->data['meta_title'] = 'Create Mouza';
        $this->data['subview'] = 'mouza/add';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function mouza_edit($id)
    {
        // CI Validation
        $this->form_validation->set_rules('name_en', 'Mouza Name', 'required|trim');

        if ($this->form_validation->run() == true) {

            $form_data = array(
                'name_en' => $this->input->post('name_en'),
                'no_en' => $this->input->post('no_en'),
                'per_division_id'=> $this->input->post('per_division_id'),
                'per_district_id'=> $this->input->post('per_district_id'),
                'per_upa_tha_id' => $this->input->post('per_upa_tha_id')
            );

            // print_r($form_data); exit;
            if ($this->Common_model->edit('mouza', $id, 'id', $form_data)) {
                $this->session->set_flashdata('success', 'Information update successfully.');
                redirect('settings/mouza');
            }
        }
        //Result
        $this->data['info'] = $this->Settings_model->get_info_mouza($id);
        //Dropdown
        $this->data['divisions'] = $this->Common_model->get_division();
        $this->data['districts'] = $this->Common_model->get_district();  
        $this->data['upazilas'] = $this->Common_model->get_upazila();  
        // Load page
        $this->data['meta_title'] = 'Edit Mouza';
        $this->data['subview'] = 'mouza/edit';
        $this->load->view('backend/_layout_main', $this->data);
    }

    public function mouza_delete($id)
    {
        if($this->Settings_model->get_mouza_delete($id)){
            $this->session->set_flashdata('success', 'Information delete successfully');
            redirect('settings/mouza');
        }else{
            $this->session->set_flashdata('warning', 'Something is wrong!');
            redirect('settings/mouza');
        }

    }

}
