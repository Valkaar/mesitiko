<?php

class BaseClass {
    
    public function loadObject($object_id) {
        $dbh = $this->load->database("real_estate");
        
        if (!empty($object_id)) {
            $query = $this->db->get_where(strtolower(__CLASS__), array(strtolower(__CLASS__) . '_id' => $id));
        }
        
        
        
        return $this;
    }
    
}