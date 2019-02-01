<?php
Class Quiz1_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    // Task 7
    public function get_image_name($room) {
        $this->db->where('room', $room);
        $query = $this->db->get('q1people');
        $array = $query->result_array();
        
        if (sizeof($array) > 0) {
            return $array[0]['Picture'];
        } else {
            return null;
        }
    }
    
    // Task 8
    public function get_people_by_room_city($minRoomNumber, $maxRoomNumber, $city) {
        if ($minRoomNumber) {
            $this->db->where('room >=', $minRoomNumber);
        }
        
        if ($maxRoomNumber) {
            $this->db->where('room <=', $maxRoomNumber);
        }
        
        if ($city) {
            $this->db->where('city', $city);
        }
        
        $query = $this->db->get('q1people');
        return $query->result_array();
    }
    
    // Task 10
    public function get_people_by_height($minHeight, $maxHeight) {
        if ($minHeight) {
            $this->db->where('height >=', $minHeight);
        }
        
        if ($maxHeight) {
            $this->db->where('height <=', $maxHeight);
        }
        
        $query = $this->db->get('q1people');
        return $query->result_array();
    }
}
