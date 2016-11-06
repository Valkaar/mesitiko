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
      
}