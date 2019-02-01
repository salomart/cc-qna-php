<?php

class Quiz0 extends CI_Controller {
    public function index() {
        $data['title'] = 'Quiz 0';
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz0');
        $this->load->view('templates/footer');
    }
    
    // Task 7
    public function copyFile() {
        $data['title'] = 'Quiz 0';
        $filename = $this->input->post('filename');
        $files = scandir('quiz0_orig');
        
        if (in_array($filename, $files)) {
            if (!file_exists('quiz0_copies/')) {
                mkdir('quiz0_copies/');
            }
            
            copy('quiz0_orig/'. $filename, 'quiz0_copies/' . $filename);
            $data['fileCopied'] = true;
        } else {
            $data['fileCopied'] = false;
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz0');
        $this->load->view('templates/footer');
    }
    
    // Task 8
    public function getImageNameByName() {
        $data['title'] = 'Quiz 0';
        $data['imageName'] = $this->quiz0_model->get_image_name($this->input->post('name'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz0');
        $this->load->view('templates/footer');
    }
    
    // Task 9
    public function getPeopleByGradeRange() {
        $data['title'] = 'Quiz 0';
        $data['people'] = $this->quiz0_model->get_people($this->input->post('lowestGrade'),
            $this->input->post('highestGrade'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz0');
        $this->load->view('templates/footer');
    }
    
    // Task 10
    public function updateUserKeywords() {
        $data['title'] = 'Quiz 0';
        $data['keywordsUpdated'] = $this->quiz0_model->update_keywords($this->input->post('name'),
            $this->input->post('keywords'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz0');
        $this->load->view('templates/footer');
    }
}
