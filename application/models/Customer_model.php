<?php

class Customer_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
 
    public function get_user_ids($user_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "user_id "
                    . "from user ";
        
        if (!empty($user_id)) {
            $query .= "where user_id = {$user_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_customer_statuses($customer_status_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "customer_status_id, "
                . "customer_status_label "
                . "from customer_status "
                . "where customer_status_id > 0 ";
        
        if (!empty($customer_status_id)) {
            $query .= "where customer_status_id = {$customer_status_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_customer_types($customer_type_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "customer_type_id, "
                . "customer_type_label "
                . "from customer_type "
                . "where customer_type_id > 0 ";
        
        if (!empty($customer_type_id)) {
            $query .= "where customer_type_id = {$customer_type_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function save_customer($customer) {
        $db_handler = $this->load_db_object();
        
        $customer_insert_query = "insert into customer "
                . "(customer_created_date_time, customer_user_id, customer_customer_status_id, customer_customer_type_id, "
                . "customer_name, customer_lastname, customer_address, customer_address_no, customer_telephone, customer_mobile,"
                . "customer_email, customer_username, customer_password "
                . "values "
                . "('" . date("Y-m-d H:i:s") . "', {$customer["user_id"]}, {$customer["customer_status"]}, {$customer["customer_type"]}, "
                . " '{$customer["name"]}', '{$customer["lastname"]}', '{$customer["address"]}', {$customer["address_no"]}, "
                . " {$customer["telephone"]}, {$customer["mobile"]}, '{$customer["email"]}', '{$customer["username"]}',"
                . " '{$customer["password"]}'  ";
                
        $db_handler->query($customer_insert_query);
    }
     
}