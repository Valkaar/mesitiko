<?php

class Customer_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
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
        
        $data = array(
            "customer_created_date_time" => date("Y-m-d H:i:s"),
            "customer_user_id" => 1,
            "customer_customer_status_id" => $customer["customer_status"],
            "customer_customer_type_id" => $customer["customer_type"],
            "customer_name" => $customer["customer_name"],
            "customer_lastname" => $customer["customer_lastname"],
            "customer_address" => $customer["customer_address"],
            "customer_address_no" => $customer["customer_address_no"],
            "customer_telephone" => $customer["customer_telephone"],
            "customer_mobile" => $customer["customer_mobile"],
            "customer_email" => $customer["customer_email"],
            "customer_username" => $customer["customer_username"],
            "customer_password" => $customer["customer_password"]
        );
        
        $db_handler->insert("customer", $data);
        
        $customer_id = $db_handler->insert_id();
        
        return $customer_id;
    }
    
    public function update_customer($customer) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "customer_created_date_time" => date("Y-m-d H:i:s"),
            "customer_user_id" => 1,
            "customer_customer_status_id" => $customer["customer_status"],
            "customer_customer_type_id" => $customer["customer_type"],
            "customer_name" => $customer["customer_name"],
            "customer_lastname" => $customer["customer_lastname"],
            "customer_address" => $customer["customer_address"],
            "customer_address_no" => $customer["customer_address_no"],
            "customer_telephone" => $customer["customer_telephone"],
            "customer_mobile" => $customer["customer_mobile"],
            "customer_email" => $customer["customer_email"],
            "customer_username" => $customer["customer_username"],
            "customer_password" => $customer["customer_password"]
        );
                
        $db_handler->where('customer_id', $customer["customer_id"]);
        $db_handler->update('customer', $data); 
        
        return $customer["customer_id"];
    }
    
    public function fetch_customer_list() {
        $db_handler = $this->load_db_object();
        
        $customer_query = "select "
                        . "'' as 'customer_checked', "
                        . "c.customer_id as 'customer_id', "
                        . "c.customer_name as 'customer_name', "
                        . "c.customer_lastname as 'customer_lastname', "
                        . "ct.customer_type_label as 'customer_type', "
                        . "cs.customer_status_label as 'customer_status', "
                        . "c.customer_mobile as 'customer_mobile', "
                        . "c.customer_telephone as 'customer_phone', "
                        . "c.customer_email as 'customer_email', "
                        . "concat(c.customer_address,' ',c.customer_address_no) as 'customer_address', "
                        . "'' as 'customer_actions' "
                    . "from customer c "
                        . "join customer_type ct on c.customer_customer_type_id = ct.customer_type_id "
                        . "join customer_status cs on c.customer_customer_status_id = cs.customer_status_id";
        
        $customer_result = $db_handler->query($customer_query)->result_array();
        
        return json_encode(array("data" => $customer_result));
    }
    
    public function get_customer_data($customer_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "customer_id, "
                    . "customer_user_id, "
                    . "customer_customer_status_id, "
                    . "customer_customer_type_id, "
                    . "customer_name, "
                    . "customer_lastname, "
                    . "customer_address, "
                    . "customer_telephone, "
                    . "customer_mobile, "
                    . "customer_email, "
                    . "customer_username, "
                    . "customer_password "
                . "from customer "
                . "where customer_id = {$customer_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
}