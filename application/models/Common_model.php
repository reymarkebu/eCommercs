<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

   public function __construct() {
      parent::__construct();
   }

   public function get_data($table, $order_by=NULL, $order=NULL) {
        $this->db->select('*');
        $this->db->from($table);
        if($order != NULL){$this->db->order_by($order_by, $order);}
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
    public function getWhere($table, $id, $field){
      return $this->db->where($field,$id)->get($table)->row();
    }
    public function delete($tbl,$by,$id) {
        $this->db->where($by, $id);
        $this->db->delete($tbl);
        return TRUE;
    }

    public function get_brand_dropdown(){
        $data[''] = '--Select Brand--';
        $this->db->select("id, brand_name");
        $this->db->from('brand');      
        $this->db->order_by('brand_name', 'ASC');
        $query = $this->db->get();

        foreach ($query->result_array() AS $rows) {
            $data[$rows['id']] = $rows["brand_name"];
        }
        return $data;
    }
    public function get_category_dropdown(){
        $data[''] = '--Select Category--';
        $this->db->select("id, category_name");
        $this->db->from('product_category');      
        $this->db->order_by('category_name', 'ASC');
        $query = $this->db->get();

        foreach ($query->result_array() AS $rows) {
            $data[$rows['id']] = $rows["category_name"];
        }
        return $data;
    }
    public function getDropdownData($tbl, $fld, $top_id = NULL, $top_fld = NULL){
      $data[''] = '--Select--';
      $this->db->select("id, $fld");
      $this->db->from($tbl);
      if ($top_id != NULL) {$this->db->where($top_fld,$top_id);}    
      $this->db->order_by($fld, 'ASC');
      $query = $this->db->get();

      foreach ($query->result_array() AS $rows) {
        $data[$rows['id']] = $rows[$fld];
      }
      return $data;
    }



   public function get_user_details($id = NULL) {
      // if no id was passed use the current users id
      $id = isset($id) ? $id : $this->session->userdata('user_id');

      $this->db->select('id, first_name, last_name, username, email, phone, user_type, created_on, last_login');
      $this->db->from('users');
      $this->db->where('id', $id);
      $query = $this->db->get()->row();        

      return $query;
   }

   public function getAllData($table){
      return $this->db->get($table)->result_array();
   }

   public function save($tbl, $data){
      return $this->db->insert($tbl, $data);
   }

    public function edit($table, $id, $field, $data) {
        $this->db->where($field, $id);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_category_by_brand($id){
        $data['0'] = '-Select Category-';
        $this->db->select("id, category_name");
        $this->db->from('product_category');
        $this->db->where('brand_id', $id);
        $this->db->order_by('category_name', 'ASC');
        $query = $this->db->get();

        foreach ($query->result_array() AS $rows) {
            $data[$rows['id']] = $rows["category_name"];
        }
        return $data;
    }

    public function get_sub_category_by_cat($id){
        $data['0'] = '-Select Sub Category-';
        $this->db->select("id, sub_category_name");
        $this->db->from('product_sub_category');
        $this->db->where('category_id', $id);
        $this->db->order_by('sub_category_name', 'ASC');
        $query = $this->db->get();

        foreach ($query->result_array() AS $rows) {
            $data[$rows['id']] = $rows["sub_category_name"];
        }
        return $data;
    }


}
