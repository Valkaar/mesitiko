<?php

class BaseClass {
    
    public function loadObject($object_id) {
        $dbh = $this->load->database("real_estate");
        
        if (!empty($object_id)) {
            $fields = array_keys(get_object_vars($this));
            
            $temp_fields = array();
            
            $final_fields = array();
        
            $query_fields = "";
            
            foreach ($fields as $field) {
                preg_match_all('/((?:^|[A-Z])[a-z]+)/', $field, $temp_fields);
                
                $final_fields[] = implode("_", $temp_fields[0]);
                
                $temp_fields = array();
            }
        
            foreach ($final_fields as $final_field) {
                $query_fields .= strtolower(__CLASS__) . "_" . $final_field . ", ";
            }
        
            $query = "select "
                        . rtrim($query_fields, ", ")
                    . " from "
                        . strtolower(__CLASS__)
                    . " where "
                        . strtolower(__CLASS__) . "_id = {$object_id}";
                    
            $result = $dbh->query($query)->row_array();
                    
            if (!empty($result)) {
                $this->Id               = $result["property_id"];
                $this->CreatedDateTime  = $result["property_created_date_time"];                
                $this->CreatedDateTime  = $result["property_created_date_time"];
            }
        }
    }
    
}