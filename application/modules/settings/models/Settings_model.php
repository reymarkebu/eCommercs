<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCategoryData() {
        $this->db->select('B.brand_name, B.brand_img, PC.*');
        $this->db->from('product_category PC');
        $this->db->join('brand B', 'B.id = PC.brand_id');
        return $this->db->get()->result();
    }
    public function getSubCategoryData() {
        $this->db->select('B.brand_name, B.brand_img, PC.category_name,PC.category_img,PSC.*');
        $this->db->from('product_sub_category PSC');
        $this->db->join('product_category PC', 'PC.id = PSC.category_id');
        $this->db->join('brand B', 'B.id = PSC.brand_id');
        return $this->db->get()->result();
    }
    public function getitemData() {
        $this->db->select('B.brand_name, B.brand_img, PC.category_name, PC.category_img, PSC.sub_category_name, PSC.sub_category_img, I.*');
        $this->db->from('item I');
        $this->db->join('product_sub_category PSC', 'PSC.id = I.sub_category_id');
        $this->db->join('product_category PC', 'PC.id = I.category_id');
        $this->db->join('brand B', 'B.id = I.brand_id');
        return $this->db->get()->result();
    }

}

