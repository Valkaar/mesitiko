<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->has_userdata('username')) {
            header('Location: /login');
        }
    }
    
    public function add_customer() {
        $this->load->model("Customer_model");
        $this->load->model("User_model");
        
        $content_data = array(
            "user_ids"                => $this->User_model->get_user_ids(),
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
    
    public function edit_customer($customer_id) {
        $this->load->model("Customer_model");
        $this->load->model("User_model");
        
        $content_data = array(
            "user_ids"          => $this->User_model->get_user_ids(),
            "customer_statuses" => $this->Customer_model->get_customer_statuses(),
            "customer_types"    => $this->Customer_model->get_customer_types(),
            
            "customer_data"     => $this->Customer_model->get_customer_data($customer_id)
        );
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Επεξεργασία πελάτη"), true),
            
            "content_view"      => $this->load->view("customer/add_customer", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)
        );
        
        $this->load->view("general/main", $data);        
    }
    
    public function customer_list() {
        $this->load->model("Customer_model");
        
        $content_data = array();
        
        $data = array(
            "head_view"         => $this->load->view("general/head", array(), true),
            "header_view"       => $this->load->view("general/header", array("header_title" => "Λίστα πελατών"), true),
            
            "content_view"      => $this->load->view("customer/customer_list", $content_data, true),
            
            "side_view"         => $this->load->view("general/side", array(), true),
            "footer_view"       => $this->load->view("general/footer", array(), true),
            "foot_view"         => $this->load->view("general/foot", array(), true)            
        );
                
        $this->load->view("general/main", $data);
    }
    
    public function save_customer() {
        $this->load->model("Customer_model");
        
        if (!$this->input->post("customer")) { 
            echo 10000001;
            return;
        }
        
        $customer = $this->input->post("customer");
        
        if (empty($customer["is_edit"])) {
            $result = $this->Customer_model->save_customer($customer);
        } else {
            $result = $this->Customer_model->update_customer($customer);            
        }
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }   
    
    public function get_customers_list() {
        $this->load->model("Customer_model");
        
        $customer_list = $this->Customer_model->fetch_customer_list();
        
        echo $customer_list;
    }
    
    public function delete_customer() {
        $this->load->library("Common");
        
        $this->common->delete_item("customer", $this->input->post("customer_id"));
    }
 
}