<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
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
    
    public function save_user() {
        $this->load->model("User_model");
        
        //$this->input->post(); //isodynamei me $_POST
        if (!$this->input->post("user")) { //isodynamei me $_POST["user"]
            echo 10000001;
            return;
        }
        
        $user = $this->input->post("user");
        
        $result = $this->User_model->save_user($user);
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo 1;
        }
    }
}