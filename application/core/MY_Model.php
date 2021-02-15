<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($table, $data)
    {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($table, $id, $field, $data)
    {
        $this->db->where($field, $id);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function exists($table, $field, $item)
    {
        $this->db->from($table);
        $this->db->where($field, $item);
        $query = $this->db->get();

        return ($query->num_rows() >= 1);
    }

    public function get_row($table, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_rows($table, $orderBy = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($orderBy != null) {
            // ASC, DESC
            $this->db->order_by('id', $orderBy);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
