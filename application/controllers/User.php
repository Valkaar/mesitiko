<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->has_userdata('username')) {
            header('Location: /login');
        }
    }
    
    public function add_user() {
        $this->load->model("User_model");
        
        $content_data = array(
            "user_statuses"       => $this->User_model->get_user_statuses()         
        );
        
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Προσθήκη χρήστη"), true),
            
            "content_view"      => $this->load->view("user/add_user", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);
    }
    
    public function edit_user($user_id) {
        $this->load->model("User_model");
        
        $content_data = array(
            "user_statuses" => $this->User_model->get_user_statuses(),
            
            "user_data"     => $this->User_model->get_user_data($user_id)
        );
        
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Επεξεργασία χρήστη"), true),
            
            "content_view"      => $this->load->view("user/add_user", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);
    }
    
    public function user_list() {
        $this->load->model("User_model");
        
        $content_data = array();
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Λίστα χρηστών"), true),
            
            "content_view"      => $this->load->view("user/user_list", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)            
        );
                
        $this->load->view("general/main", $data);
    }
    
    public function save_user() {
        $this->load->model("User_model");
        
        //$this->input->post(); //isodynamei me $_POST
        if (!$this->input->post("user")) { //isodynamei me $_POST["user"]
            echo 10000001;
            return;
        }
        
        $user = $this->input->post("user");
        
        if (empty($user["is_edit"])) {
            $result = $this->User_model->save_user($user);
        } else {
            $result = $this->User_model->update_user($user);            
        }
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }
    
    public function get_users_list() {
        $this->load->model("User_model");
        
        $user_list = $this->User_model->fetch_user_list();
        
        echo $user_list;
    }
    
    public function delete_user() {
        $this->load->library("Common");
        
        $this->common->delete_item("user", $this->input->post("user_id"));
    }
}