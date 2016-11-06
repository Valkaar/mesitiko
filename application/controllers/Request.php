<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    
    public function add_request() {
        $this->load->model("Request_model");
        
        $content_data = array(
            "prefectures"       => $this->Request_model->get_prefectures(),
            "municipalities"    => $this->Request_model->get_municipalities(),
            "areas"             => $this->Request_model->get_areas(),
            
            "transaction_types" => $this->Request_model->get_transaction_types(),
            "property_types"    => $this->Request_model->get_property_types(),
            "property_statuses" => $this->Request_model->get_property_statuses(),
                
            "heatings"          => $this->Request_model->get_heatings()
        );
        
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Προσθήκη ζήτησης"), true),
            
            "content_view"      => $this->load->view("request/add_request", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);
    }
    
}