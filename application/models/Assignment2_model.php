<?php
Class Assignment2_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    // Task 1
    public function get_larger_magnitudes($magnitude) {
        $this->db->where('mag >=', $magnitude);
        $query = $this->db->get('a2earthquakes');
        $array = $query->result_array();
        
        if ($array != null) {
            return sizeof($array);
        } else {
            return 0;
        }
    }
    
    // Task 2
    public function get_locations($lowestMagnitude, $highestMagnitude, $fromDate, $toDate) {
        if ($lowestMagnitude) {
            $this->db->where('mag >=', $lowestMagnitude);
        }
        
        if ($highestMagnitude) {
            $this->db->where('mag <=', $highestMagnitude);
        }
        
        $query = $this->db->get('a2earthquakes');
        $resultArr = $query->result_array();
        
        $newResultArr = array();
        $newFromDate = strtotime($fromDate);
        $newToDate = strtotime($toDate);
        
        if ($newFromDate != false && $newToDate != false) {
            foreach ($resultArr as $result) {
                $resultDate = strtotime($result['time']);
                
                if ($resultDate >= $newFromDate && $resultDate <= $newToDate) {
                    array_push($newResultArr, $result);
                }
            }
        } else if ($newFromDate != false) {
            foreach ($resultArr as $result) {
                $resultDate = strtotime($result['time']);
                
                if ($resultDate >= $newFromDate) {
                    array_push($newResultArr, $result);
                }
            }
        } else if ($newToDate != false) {
            foreach ($resultArr as $result) {
                $resultDate = strtotime($result['time']);
                
                if ($resultDate <= $newToDate) {
                    array_push($newResultArr, $result);
                }
            }
        }
        
        if (sizeof($newResultArr) > 0) {
            $resultArr = $newResultArr;
        }
        
        $locations = array();
        
        if ($resultArr != null) {
            foreach ($resultArr as $result) {
                if (array_key_exists($result['locationSource'], $locations)) {
                    $locations[$result['locationSource']] = $locations[$result['locationSource']] + 1;
                } else {
                    $locations[$result['locationSource']] = 1;
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
        $query = $this->db->get('a2earthquakes');
        
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
        $query = $this->db->get('a2earthquakes');
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
