<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function add_customer() {
        $this->load->model("Customer_model");
        
        $content_data = array(
            "user_ids"                => $this->Customer_model->get_user_ids(),
            "customer_statuses"       => $this->Customer_model->get_customer_statuses(),
            "customer_types"          => $this->Customer_model->get_customer_types()                 
        );
        
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Προσθήκη πελάτη"), true),
            
            "content_view"      => $this->load->view("customer/add_customer", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);
    }
    
    public function save_customer() {
        $this->load->model("Customer_model");
        
        //$this->input->post(); //isodynamei me $_POST
        if (!$this->input->post("customer")) { //isodynamei me $_POST["customer"]
            echo 10000001;
            return;
        }
        
        $property = $this->input->post("customer");
        
        $result = $this->Customer_model->save_customer(customer);
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo 1;
        }
    }   
 
}