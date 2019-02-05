<?php
Class Assignment2_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    // Task 1
    public function get_larger_magnitudes($magnitude) {
        $this->db->where('mag >=', $magnitude);
        $query = $this->db->get('q2earthquakes');
        $array = $query->result_array();
        
        if ($array != null) {
            return sizeof($array);
        } else {
            return 0;
        }
    }
    
    // Task 2
    public function get_locations($lowestMagnitude, $highestMagnitude) {
        if ($lowestMagnitude) {
            $this->db->where('mag >=', $lowestMagnitude);
        }
        
        if ($highestMagnitude) {
            $this->db->where('mag <=', $highestMagnitude);
        }
        
        $query = $this->db->get('q2earthquakes');
        $resultArr = $query->result_array();
        $locations = array();
        
        if ($resultArr != null) {
            foreach ($resultArr as $result) {
                if (array_key_exists($result["locationSource"], $locations)) {
                    $locations[$result["locationSource"]] = $locations[$result["locationSource"]] + 1;
                } else {
                    $locations[$result["locationSource"]] = 1;
                }
            }
        }
        
        return $locations;
    }
}
