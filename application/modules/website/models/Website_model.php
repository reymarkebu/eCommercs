<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends MY_Model{
   public function __construct(){

   }

  public function products(){
    $data = $this->db->get('brand')->result_array();
    foreach ($data as $key => $value) {
      $brand_id = $value['id'];
      $data[$key]['cats'] = $this->db->where('brand_id',$brand_id)->get('product_category')->result_array();
      foreach ($data[$key]['cats'] as $key2 => $value2) {
        $category_id = $value2['id'];
        $data[$key]['cats'][$key2]['sub_cats'] = $this->db->where('category_id',$category_id)->get('product_sub_category')->result_array();
        foreach ($data[$key]['cats'][$key2]['sub_cats'] as $key3 => $value3) {
          $sub_category_id = $value3['id'];
          $data[$key]['cats'][$key2]['sub_cats'][$key3]['items'] = $this->db->where('sub_category_id',$sub_category_id)->get('item')->result_array();
        }
      }
    }
    return $data;
    echo "<pre>";
    print_r($data);exit();
  }

  public function categorys($brand_name){
    $this->db->select('PC.*');
    $this->db->from('product_category PC');
    $this->db->join('brand B','PC.brand_id = B.id');
    $this->db->where('B.brand_name',$brand_name);
    return $this->db->get()->result_array();
  }

  public function sub_categorys($brand_name,$category_name){
    $this->db->select('PSC.*');
    $this->db->from('product_sub_category PSC');
    $this->db->join('product_category PC','PSC.category_id = PC.id');
    $this->db->join('brand B','PSC.brand_id = B.id');
    $this->db->where('PC.category_name',$category_name);
    $this->db->where('B.brand_name',$brand_name);
    return $this->db->get()->result_array();
  }

  public function items($brand_name,$category_name,$sub_category_name){
    $this->db->select('I.*');
    $this->db->from('item I');
    $this->db->join('product_sub_category PSC','I.sub_category_id = PSC.id');
    $this->db->join('product_category PC','I.category_id = PC.id');
    $this->db->join('brand B','I.brand_id = B.id');
    $this->db->where('PSC.sub_category_name',$sub_category_name);
    $this->db->where('PC.category_name',$category_name);
    $this->db->where('B.brand_name',$brand_name);
    return $this->db->get()->result_array();
  }

  public function item_details($model_no){
    $this->db->select('B.brand_name, PC.category_name, PSC.sub_category_name, I.*');
    $this->db->from('item I');
    $this->db->join('product_sub_category PSC','I.sub_category_id = PSC.id');
    $this->db->join('product_category PC','I.category_id = PC.id');
    $this->db->join('brand B','I.brand_id = B.id');
    $this->db->where('I.model_no',$model_no);
    return $this->db->get()->row();
    print_r($this->db->get()->result_array());exit();
  }

}
?>