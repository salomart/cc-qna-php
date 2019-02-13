<?php
Class Quiz2_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        date_default_timezone_set('UTC');
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
    public function get_quakes_by_cdm($latitude, $longitude, $distance, $mag) {
        if ($latitude && $longitude && $distance && $mag) {
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
                    $distance2 = $kmPerDegree * sqrt(($latitudeDiff * $latitudeDiff) + ($longitudeDiff * $longitudeDiff));
                    
                    if ($distance >= $distance2) {
                        array_push($quakes, $result);
                    }
                }
                
                return $quakes;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    // Task 9
    public function get_quakes_by_pr($minPolarity, $maxPolarity) {
        if ($minPolarity && $maxPolarity) {
            $sql = 'SELECT locationSource, COUNT(*) AS count, MAX(mag) AS max '
                . 'FROM q2quakes INNER JOIN q2polarity '
                    . 'ON q2quakes.locationSource=q2polarity.Location '
                        . 'WHERE Polarity >=150 AND Polarity <= 200 GROUP BY locationSource';
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            return array();
        }
    }
}
