<?php

class User_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
    
    public function get_user_statuses($user_status_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "user_status_id, "
                    . "user_status_label "
                    . "from user_status ";
        
        if (!empty($user_status_id)) {
            $query .= "where user_status_id = {$user_status_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    } 
    
    public function save_user($user) {
        $db_handler = $this->load_db_object();
        
        $property_insert_query = "insert into user "
                . "(user_name, user_lastname, user_username, user_password, user_email, user_isadmin, user_user_status_id "
                . "values "
                . " {$user["user_name"]}, {$user["user_lastname"]}, {$user["user_username"]}, {$user["user_password"]}, "
                . " {$user["user_email"]}, {$user["user_isadmin"]}, {$user["user_status_id"]} ";
                
        $db_handler->query($user_insert_query);
    }
    
      
}