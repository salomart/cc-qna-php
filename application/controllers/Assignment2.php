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
    public function getLocsByMagRange() {
        $data['title'] = 'Assignment 2';
        $data['locations'] = $this->assignment2_model->get_locations($this->input->post('lowestMagnitude'),
            $this->input->post('highestMagnitude'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/assignment2');
        $this->load->view('templates/footer');
    }
}
