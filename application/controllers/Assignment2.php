<?php

class Assignment2 extends CI_Controller {
    public function index() {
        $data['title'] = 'Assignment 2';
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
    
    // Task 1
    public function getLargerMagnitudes() {
        $data['title'] = 'Assignment 2';
        $data['numOfMagnitudes'] = $this->assignment2_model->get_larger_magnitudes($this->input->post('magnitude'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
    
    // Task 2
    public function getLocsByMagRangeAndDate() {
        $data['title'] = 'Assignment 2';
        $data['locations'] = $this->assignment2_model->get_locations($this->input->post('lowestMagnitude'),
            $this->input->post('highestMagnitude'), $this->input->post('fromDate'),
            $this->input->post('toDate'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
    
    // Task 3
    public function getQuakesByLocRange() {
        $data['title'] = 'Assignment 2';
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $distance = $this->input->post('distance');
        
        if ($latitude != null && strcmp($latitude, '') != 0
            && $longitude != null && strcmp($longitude, '') != 0
            && $distance != null && strcmp($distance, '') != 0) {
            $data['quakes'] = $this->assignment2_model->get_quakes($latitude, $longitude, $distance);
        } else {
            $data['quakes'] = array();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
    
    // Task 4
    public function getLocalTime() {
        $data['title'] = 'Assignment 2';
        $data['localTime'] = $this->assignment2_model->get_local_time($this->input->post('quakeId'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
}
