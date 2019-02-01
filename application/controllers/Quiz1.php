<?php

class Quiz1 extends CI_Controller {
    public function index() {
        $data['title'] = 'Quiz 1';
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz1');
        $this->load->view('templates/footer');
    }
    
    // Task 6
    public function showImageAndSize() {
        $data['title'] = 'Quiz 1';
        $filename = $this->input->post('filename');
        $files = scandir('quiz1_orig');
        
        if ($filename != null && strcmp($filename, '') != 0 && in_array($filename, $files)) {
            $data['imageLoc'] = $filename;
            $data['imageSize'] = filesize('quiz1_orig/' . $filename);
        } else {
            $data['imageLoc'] = null;
            $data['imageSize'] = null;
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz1');
        $this->load->view('templates/footer');
    }
    
    // Task 7
    public function getImageNameByRoomNum() {
        $data['title'] = 'Quiz 1';
        $data['imageName'] = $this->quiz1_model->get_image_name($this->input->post('room'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz1');
        $this->load->view('templates/footer');
    }
    
    // Task 8
    public function getPeopleByRoomCity() {
        $data['title'] = 'Quiz 1';
        $data['people'] = $this->quiz1_model->get_people_by_room_city($this->input->post('minRoomNumber'),
            $this->input->post('maxRoomNumber'), $this->input->post('city'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz1');
        $this->load->view('templates/footer');
    }
    
    // Task 10
    public function moveFiles() {
        $data['title'] = 'Quiz 1';
        $moveResults = $this->quiz1_model->get_people_by_height($this->input->post('minHeight'),
            $this->input->post('maxHeight'));
        $files = scandir('quiz1_orig');
        $moveCount = 0;
        
        foreach ($moveResults as $result) {
            if ($result['Picture'] != null && strcmp($result['Picture'], '') != 0
                && file_exists('quiz1_orig/' . $result['Picture']) && in_array($result['Picture'], $files)) {
                if (!file_exists('quiz1_newLoc/')) {
                    mkdir('quiz1_newLoc/');
                }
                
                rename('quiz1_orig/'. $result['Picture'], 'quiz1_newLoc/' . $result['Picture']);
                $moveCount = $moveCount + 1;
            }
        }
        
        if ($moveCount > 0) {
            $data['filesMoved'] = true;
        } else {
            $data['filesMoved'] = false;
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/quiz1');
        $this->load->view('templates/footer');
    }
}
