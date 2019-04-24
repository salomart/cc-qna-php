<?php
Class Quiz7_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    // Task 7
    public function get_all_data() {
        $query = $this->db->get('q7data');
        $array = $query->result_array();
        
        if ($array && count($array) > 0) {
            return $array;
        } else {
            return [];
        }
    }
    
    // Task 8
    public function get_filtered_data($name, $year) {
        if ($name) {
            $this->db->where('name', $name);
        }
        
        if ($year) {
            $this->db->where('year', $year);
        }
		
		$query = $this->db->get('q7data');
        return $query->result_array();
    }
}
