<?php

class Home extends CI_Controller {
    public function index() {
        $data['title'] = "Cloud Computing Quizzes and Assignments";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }
}
