<?php

class Login_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
    
    public function logUserIn($username, $password) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "user_name, "
                    . "user_lastname, "
                    . "user_username, "
                    . "user_isadmin "
                . "from "
                    . "user "
                . "where "
                    . "user_username = '{$username}' "
                    . "and user_password = '" . md5($password) . "'";
                    
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
    
}