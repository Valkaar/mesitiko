<?php

class Request_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
    
    
}