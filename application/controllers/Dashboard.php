<?php

class Dashboard extends CI_Controller {
    
    public function index() {
        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Αρχική Σελίδα"), true),
            
            "content_view" => $this->load->view("dashboard/dashboard", array(), true),
            
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true) 
        );
        
        $this->load->view("general/main", $data);
    }
    
}