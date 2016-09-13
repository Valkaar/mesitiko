<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {
    
    public function add_property() {
        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array(), true),
            "content_view" => $this->load->view("property/add_property", array(), true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true) 
        );
        
        $this->load->view("general/main", $data);
    }
    
}