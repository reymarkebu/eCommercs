<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manage_model extends CI_Model{
    public function __construct(){

    }

    public function users(){
        $data = $this->db->get('users')->result_array();
        foreach($data as $key => $val){
            $id = $val['id'];

            $this->db->select('G.*');
            $this->db->from('users_groups UG');
            $this->db->where('UG.user_id',$id);
            $this->db->join('groups G','UG.group_id = G.id');
            $data[$key]['roles'] = $this->db->get()->result_array();
        }
        return $data;
    }



}
?>