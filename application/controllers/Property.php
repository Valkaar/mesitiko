<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {
    
    public function add_property() {
        $this->load->model("Property_model");
        
        $content_data = array(
            "prefectures"       => $this->Property_model->get_prefectures(),
            "municipalities"    => $this->Property_model->get_municipalities(),
            "areas"             => $this->Property_model->get_areas(),
            
            "transaction_types" => $this->Property_model->get_transaction_types(),
            "property_types"    => $this->Property_model->get_property_types(),
            "property_statuses" => $this->Property_model->get_property_statuses()
        );
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Προσθήκη ακινήτου"), true),
            
            "content_view"      => $this->load->view("property/add_property", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);
    }
    
}