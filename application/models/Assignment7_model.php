<?php
Class Assignment7_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        date_default_timezone_set('UTC');
    }
	
	public function get_items_for_sale($username) {
		if ($username != null) {
			$this->db->where('seller !=', $username);
		}
		
		$this->db->where('hidden', 0);
		$query = $this->db->get('a7items');
        $array = $query->result_array();
        
        if ($array != null) {
            return $array;
        } else {
            return [];
        }
    }
	
	public function register_user($username, $password) {
		if ($username != null && $password != null) {
			$data = array(
				'username' => $username,
				'password' => $password
			);
			
			$this->db->insert('a7users', $data);
			$status = $this->db->affected_rows();
			
			if ($status == -1 || $status == 0) {
				return 1;
			}
			return 2;
		} else {
			return 1;
		}
	}
	
	public function login_user($username, $password) {
		if ($username != null && $password != null) {
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('a7users');
			$array = $query->result_array();
			
			if ($array != null && count($array) == 1) {
				if ($array[0]['admin'] == 1) {
					return 6;
				} else if ($array[0]['activated'] == 1) {
					return 5;
				} else {
					return 4;
				}
			} else {
				return 3;
			}
		} else {
			return 3;
		}
	}
	
	public function checkout_items($username, $cart) {
		if ($username != null && $cart != null) {
			$last_row = $this->db->select('*')->order_by('id','desc')->limit(1)->get('a7orders')->result_array();
			$order_id = ($last_row != null && !empty($last_row)) ? ($last_row[0]['orderId'] + 1) : 1;
			
			for ($i=0; $i<count($cart); $i++) {
				$data = array(
					'orderId' => $order_id,
					'itemId' => $cart[$i]['id'],
					'buyer' => $username
				);
				
				$this->db->insert('a7orders', $data);
			}
			
			$status = $this->db->affected_rows();
			
			if ($status == -1 || $status == 0) {
				return 7;
			}
			return 8;
		} else {
			return 7;
		}
	}
	
	public function get_purchases($username) {
		$this->db->select('*');
		$this->db->from('a7orders');
		$this->db->join('a7items', 'a7orders.itemId = a7items.id');
		$this->db->where('buyer', $username);
		$this->db->order_by('orderId', 'desc');
		$query = $this->db->get();
		$array = $query->result_array();
		
		if ($array != null) {
			return $array;
		} else {
			return [];
		}
	}
	
	public function selling($username) {
		if ($username != null) {
			$this->db->where('seller', $username);
			$this->db->where('hidden', 0);
			$query = $this->db->get('a7items');
			$array = $query->result_array();
			
			if ($array != null) {
				return $array;
			} else {
				return [];
			}
		} else {
			return [];
		}
	}
	
	public function add_selling($name, $description, $price, $username, $filename) {
		if ($name != null && $price != null && $username != null) {
			$data = array(
				'name' => $name,
				'description' => $description,
				'price' => $price,
				'seller' => $username,
				'filename' => $filename
			);
			
			$this->db->insert('a7items', $data);
			$status = $this->db->affected_rows();
			
			if ($status == -1 || $status == 0) {
				return 9;
			}
			return 10;
		} else {
			return 9;
		}
	}
	
	public function delete_selling($id, $username) {
		if ($id != null && $username != null) {
			$data = array(
				'hidden' => 1
			);
			
			$this->db->where('id', $id);
			$this->db->where('seller', $username);
			$this->db->update('a7items', $data);
			$status = $this->db->affected_rows();
			
			if ($status == -1 || $status == 0) {
				return 11;
			}
			return 12;
		} else {
			return 11;
		}
	}
	
	public function get_users($username) {
		if ($username != null) {
			$this->db->where('username !=', $username);
			$query = $this->db->get('a7users');
			$array = $query->result_array();
			
			if ($array != null) {
				return $array;
			} else {
				return [];
			}
		} else {
			return [];
		}
	}
	
	public function update_user($username, $activated, $itemLimit) {
		if ($username != null) {
			$data = array(
				'activated' => ($activated != null && $activated == 'true' ? 1 : 0),
				'itemLimit' => $itemLimit
			);
			
			$this->db->where('username', $username);
			$this->db->update('a7users', $data);
			$status = $this->db->affected_rows();
			
			if ($status == -1 || $status == 0) {
				return 13;
			}
			return 14;
		} else {
			return 13;
		}
	}
	
	public function get_limit($username) {
		if ($username != null) {
			$this->db->where('username', $username);
			$query = $this->db->get('a7users');
			$array = $query->result_array();
			
			if ($array != null && count($array) == 1) {
				return $array[0]['itemLimit'];
			} else {
				return [];
			}
		} else {
			return [];
		}
	}
}
