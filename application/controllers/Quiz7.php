<?php

class Quiz7 extends CI_Controller {
    public function index() {
        $data['title'] = 'Quiz 7';
		// Task 7
		$data['all_data'] = $this->quiz7_model->get_all_data();
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz7');
        $this->load->view('templates/footer');
    }
    
    // Task 8
    public function showImagesByNameYear() {
        $data['title'] = 'Quiz 7';
		$name = $this->input->post('name');
		$year = $this->input->post('year');
		$data['filtered_data'] = $this->quiz7_model->get_filtered_data($name, $year);
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz7');
        $this->load->view('templates/footer');
    }
}
