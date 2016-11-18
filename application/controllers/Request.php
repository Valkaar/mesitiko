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
    
    public function edit_request($request_id) {
        $this->load->model("Request_model");
        
        $content_data = array(
            "prefectures"               => $this->Request_model->get_prefectures(),
            "municipalities"            => $this->Request_model->get_municipalities(),
            "areas"                     => $this->Request_model->get_areas(),
            
            "transaction_types"         => $this->Request_model->get_transaction_types(),
            "property_types"            => $this->Request_model->get_property_types(),
            "property_statuses"         => $this->Request_model->get_property_statuses(),
                
            "heatings"                  => $this->Request_model->get_heatings(),
            
            "request_data"              => $this->Request_model->get_request_data($request_id),
            "request_type_data"         => $this->Request_model->get_request_type_data($request_id),
            "request_status_data"       => $this->Request_model->get_request_status_data($request_id),
            "request_prefecture_data"   => $this->Request_model->get_request_prefecture_data($request_id),
            "request_municipality_data" => $this->Request_model->get_request_municipality_data($request_id),
            "request_area_data"         => $this->Request_model->get_request_area_data($request_id),
            "request_heating_data"      => $this->Request_model->get_request_heating_data($request_id)
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
    
    public function save_request() {
        $this->load->model("Request_model");
        
        //$this->input->post(); //isodynamei me $_POST
        if (!$this->input->post("request")) { //isodynamei me $_POST["request"]
            echo 10000001;
            return;
        }
        
        $request = $this->input->post("request");
        
        $result = $this->Request_model->save_request($request);
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }
    
    
}