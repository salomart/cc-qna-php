<?php

class Assignment7 extends CI_Controller {
    public function index() {
        $data['title'] = 'Assignment 7';
		
		if ($this->input->method() == 'post') {
			if ($this->input->post('action') == 'register') {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data['status'] = $this->assignment7_model->register_user($username, $password);
				$data['items'] = $this->assignment7_model->get_items_for_sale(null);
			} else if ($this->input->post('action') == 'login') {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data['status'] = $this->assignment7_model->login_user($username, $password);
				
				if ($data['status'] == 5) {
					$this->session->set_userdata('username', $username);
				} else if ($data['status'] == 6) {
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('admin', $username);
				}
				
				$data['items'] = $this->assignment7_model->get_items_for_sale($username);
			} else if ($this->input->post('action') == 'logout') {
				$this->session->unset_userdata('username');
				
				if ($this->session->has_userdata('admin')) {
					$this->session->unset_userdata('admin');
				}
				
				if ($this->session->has_userdata('cart')) {
					$this->session->unset_userdata('cart');
				}
				
				$data['items'] = $this->assignment7_model->get_items_for_sale(null);
			}
		} else if ($this->session->has_userdata('username')) {
			$username = $this->session->userdata('username');
			$data['items'] = $this->assignment7_model->get_items_for_sale($username);
		} else {
			$data['items'] = $this->assignment7_model->get_items_for_sale(null);
		}
		
		$this->load->view('templates/header', $data);
        $this->load->view('pages/assignment7-header');
		$this->load->view('pages/assignment7-home');
        $this->load->view('templates/footer');
    }
	
	public function cart() {
		$data['title'] = 'Assignment 7';
		
		if ($this->input->method() == 'post') {
			if ($this->input->post('action') == 'add') {
				$id = $this->input->post('id');
				$name = $this->input->post('name');
				$price = $this->input->post('price');
				$seller = $this->input->post('seller');
				$filename = $this->input->post('filename');
				
				if ($this->session->has_userdata('cart')) {
					$cart = $this->session->userdata('cart');
					$item = [
						'id' => $id,
						'name' => $name,
						'price' => $price,
						'seller' => $seller,
						'filename' => $filename
					];
					
					array_push($cart, $item);
					$this->session->set_userdata('cart', $cart);
				} else {
					$cart = [
						[
							'id' => $id,
							'name' => $name,
							'price' => $price,
							'seller' => $seller,
							'filename' => $filename
						]
					];
					
					$this->session->set_userdata('cart', $cart);
				}
			} else if ($this->input->post('action') == 'remove') {
				$cart = $this->session->userdata('cart');
				$index = $this->input->post('key');
				array_splice($cart, $index, 1);
				$this->session->set_userdata('cart', $cart);
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/assignment7-header');
		$this->load->view('pages/assignment7-cart');
		$this->load->view('templates/footer');
	}
	
	public function purchases() {
        $data['title'] = 'Assignment 7';
		$username = $this->session->userdata('username');
		
		if ($this->input->method() == 'post' && $this->input->post('action') == 'checkout') {
			$cart = $this->session->userdata('cart');
			$data['status'] = $this->assignment7_model->checkout_items($username, $cart);
			
			if ($data['status'] == 8) {
				$this->session->unset_userdata('cart');
			}
		}
		
		$data['purchases'] = $this->assignment7_model->get_purchases($username);
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/assignment7-header');
		$this->load->view('pages/assignment7-purchases');
		$this->load->view('templates/footer');
	}
	
	public function selling() {
        $data['title'] = 'Assignment 7';
		$username = $this->session->userdata('username');
		
		if ($this->input->method() == 'post') {
			if ($this->input->post('action') == 'add') {
				if (!file_exists('uploads/')) {
					mkdir('uploads/');
				}
				
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 100;
				$config['max_width'] = 1024;
				$config['max_height'] = 768;
				
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('imageFile')) {
					$data['status'] = 15;
				} else {
					$filename = $this->upload->data('file_name');
					$name = $this->input->post('name');
					$description = $this->input->post('description');
					$price = $this->input->post('price');
					$data['status'] = $this->assignment7_model->add_selling($name, $description, $price, $username, $filename);
				}
			} else if ($this->input->post('action') == 'delete') {
				$id = $this->input->post('id');
				$data['status'] = $this->assignment7_model->delete_selling($id, $username);
			}
		}
		
		$data['selling'] = $this->assignment7_model->selling($username);
		$data['itemLimit'] = $this->assignment7_model->get_limit($username);
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/assignment7-header');
		$this->load->view('pages/assignment7-selling');
		$this->load->view('templates/footer');
	}
	
	public function admin() {
        $data['title'] = 'Assignment 7';
		$admin = $this->session->userdata('username');
		
		if ($this->input->method() == 'post' && $this->input->post('action') == 'update') {
			$username = $this->input->post('username');
			$activated = $this->input->post('activated');
			$itemLimit = $this->input->post('itemLimit');
			$data['status'] = $this->assignment7_model->update_user($username, $activated, $itemLimit);
		}
		
		$data['users'] = $this->assignment7_model->get_users($admin);
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/assignment7-header');
		$this->load->view('pages/assignment7-admin');
		$this->load->view('templates/footer');
	}
}
