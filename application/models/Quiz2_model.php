<?php
Class Quiz2_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        date_default_timezone_set('UTC');
    }
    
    // Task 1
    public function get_larger_magnitudes($magnitude) {
        $this->db->where('mag >=', $magnitude);
        $query = $this->db->get('q2quakes');
        $array = $query->result_array();
        
        if ($array != null) {
            return sizeof($array);
        } else {
            return 0;
        }
    }
    
    // Task 7
    public function get_mags($lowestMagnitude, $highestMagnitude, $net) {
        if ($lowestMagnitude && $highestMagnitude && $net) {
            $this->db->where('mag >=', $lowestMagnitude);
            $this->db->where('mag <=', $highestMagnitude);
            $this->db->where('net', $net);
            
            $query = $this->db->get('q2quakes');
            $resultArr = $query->result_array();
            
            $mags = array();
            
            for ($i=0; $i<20; $i++) {
                array_push($mags, 0);
            }
            
            foreach ($resultArr as $result) {
                $index = (int)($result['mag'] * 2);
                $mags[$index] = $mags[$index] + 1;
            }
            
            return $mags;
        } else {
            return array();
        }
    }
    
    // Task 8
    public function get_quakes($latitude, $longitude, $distance, $mag) {
        $kmPerDegree = 111.2;
        $lowestLatitude = $latitude - ($distance / $kmPerDegree);
        $highestLatitude = $latitude + ($distance / $kmPerDegree);
        $lowestLongitude = $longitude - ($distance / $kmPerDegree);
        $highestLongitude = $longitude + ($distance / $kmPerDegree);
        
        $this->db->where('latitude >=', $lowestLatitude);
        $this->db->where('latitude <=', $highestLatitude);
        $this->db->where('longitude >=', $lowestLongitude);
        $this->db->where('longitude <=', $highestLongitude);
        $this->db->where('mag >', $mag);
        $query = $this->db->get('q2quakes');
        
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
    
    // Task 4
    public function get_local_time($quakeId) {
        $this->db->where('id', $quakeId);
        $query = $this->db->get('q2quakes');
        $array = $query->result_array();
        
        if ($array != null && sizeof($array) > 0) {
            $gmtTime = strtotime($array[0]['time']);
            $longitude = $array[0]['longitude'];
            $diff = (int)abs($longitude / 15);
            $localTime = null;
            
            if ($longitude >= 0) {
                $localTime = $gmtTime + (60 * 60 * $diff);
            } else {
                $localTime = $gmtTime - (60 * 60 * ($diff + 1));
            }
            
            return $localTime;
        } else {
            return 0;
        }
    }
}
