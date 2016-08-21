<?php

class Property_model extends CI_Model {
    
    public function test_db() {
        $db_conn = $this->load->database("default", true);
        
        return $db_conn->query("select * from tester")->result_array();
    }
    
}