<?php

class User_model extends CI_Model {
    
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
                
        $data = array(
            "user_name" => $user["name"],
            "user_lastname" => $user["lastname"],
            "user_username" => $user["username"],
            "user_password" => md5($user["password"]),
            "user_email" => $user["email"],
            "user_isadmin" => ($user["is_admin"] === "true" ? 1 : 0),
            "user_user_status_id" => $user["status"]
        );
        
        $db_handler->insert("user", $data);
        
        $user_id = $db_handler->insert_id();
        
        return $user_id;
    }
    
    public function update_user($user) {
        $db_handler = $this->load_db_object();
                
        $data = array(
            "user_name" => $user["name"],
            "user_lastname" => $user["lastname"],
            "user_username" => $user["username"],
            "user_password" => $user["password"],
            "user_email" => $user["email"],
            "user_isadmin" => ($user["is_admin"] === "true" ? 1 : 0),
            "user_user_status_id" => $user["status"]
        );
                
        $db_handler->where('user_id', $user["user_id"]);
        $db_handler->update('user', $data); 
        
        return $user["user_id"];
    }
    
    public function fetch_user_list() {
        $db_handler = $this->load_db_object();        
        
        $user_query = "select "
                            . "'' as 'user_checked', "
                            . "u.user_id as 'user_id', "
                            . "u.user_name as 'user_name', "
                            . "u.user_lastname as 'user_lastname', "
                            . "u.user_email as 'user_email', "
                            . "us.user_status_label as 'user_status', "
                            . "if (u.user_isadmin = 1, 'Yes', 'No') as 'user_isadmin', "
                            . "'' as 'user_actions' "
                        . "from user u "
                            . "join user_status us on u.user_user_status_id = us.user_status_id ";
        
        $user_result = $db_handler->query($user_query)->result_array();
        
        return json_encode(array("data" => $user_result));
    }
    
    public function get_user_data($user_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "user_id, "
                . "user_name, "
                . "user_lastname, "
                . "user_username, "
                . "user_password, "
                . "user_email, "
                . "user_isadmin, "
                . "user_user_status_id "
                . "from user "
                . "where user_id = {$user_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
      
}