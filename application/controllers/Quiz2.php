<?php

class Quiz2 extends CI_Controller {
    public function index() {
        $data['title'] = 'Quiz 2';
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz2');
        $this->load->view('templates/footer');
    }
    
    // Task 7
    public function getMagsByRangeAndNet() {
        $data['title'] = 'Quiz 2';
        
        $data['mags'] = $this->quiz2_model->get_mags($this->input->post('lowestMagnitude'),
            $this->input->post('highestMagnitude'), $this->input->post('net'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz2');
        $this->load->view('templates/footer');
    }
    
    // Task 8
    public function getQuakesByCoordDistMag() {
        $data['title'] = 'Quiz 2';
        
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $distance = $this->input->post('distance');
        $mag = $this->input->post('mag');
        
        $data['quakes'] = $this->quiz2_model->get_quakes_by_cdm($latitude, $longitude,
            $distance, $mag);
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz2');
        $this->load->view('templates/footer');
    }
    
    // Task 9
    public function getQuakesByPolarity() {
        $data['title'] = 'Quiz 2';
        
        $minPolarity = $this->input->post('minPolarity');
        $maxPolarity = $this->input->post('maxPolarity');
        
        $data['quakesCountAndMax'] = $this->quiz2_model->get_quakes_by_pr($minPolarity,
            $maxPolarity);
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz2');
        $this->load->view('templates/footer');
    }
}
