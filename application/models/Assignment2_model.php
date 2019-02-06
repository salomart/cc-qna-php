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
    
    // Task 3
    public function get_quakes($latitude, $longitude, $distance) {
        $kmPerDegree = 111.2;
        $lowestLatitude = $latitude - ($distance / $kmPerDegree);
        $highestLatitude = $latitude + ($distance / $kmPerDegree);
        $lowestLongitude = $longitude - ($distance / $kmPerDegree);
        $highestLongitude = $longitude + ($distance / $kmPerDegree);
        
        $this->db->where('latitude >=', $lowestLatitude);
        $this->db->where('latitude <=', $highestLatitude);
        $this->db->where('longitude >=', $lowestLongitude);
        $this->db->where('longitude <=', $highestLongitude);
        $query = $this->db->get('q2earthquakes');
        
        $resultArr = $query->result_array();
        
        if (sizeof($resultArr) > 0) {
            $quakes = array();
            
            foreach ($resultArr as $result) {
                $latitudeDiff = $result['latitude'] - $latitude;
                $longitudeDiff = $result['longitude'] - $longitude;
                $distance2 = $kmPerDegree * sqrt(($latitudeDiff * $latitudeDiff)
                    + ($longitudeDiff * $longitudeDiff));
                
                if ($distance >= $distance2) {
                    array_push($quakes, $result);
                }
            }
            
            return $quakes;
        } else {
            return array();
        }
    }
}
