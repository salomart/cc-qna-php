<?php
Class Quiz0_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    // Task 8
    public function get_image_name($name) {
        $this->db->where('name =', $name);
        $query = $this->db->get('q0people');
        $array = $query->result_array();
        
        if (sizeof($array) > 0) {
            return $array[0]['Picture'];
        } else {
            return null;
        }
    }
    
    // Task 9
    public function get_people($lowestGrade, $highestGrade) {
        if ($lowestGrade) {
            $this->db->where('grade >', $lowestGrade);
        }
        
        if ($highestGrade) {
            $this->db->where('grade <', $highestGrade);
        }
        
        $query = $this->db->get('q0people');
        return $query->result_array();
    }
    
    // Task 10
    public function update_keywords($name, $keywords) {
        $this->db->set(array('keywords' => $keywords));
        $this->db->where('name', $name);
        
        if (!$this->db->update('q0people')) {
            return $this->db->error();
        }
    }
}