<?php

class Test_controller extends CI_Controller {
    
    public function test_objects() {
        $object_id = 54;
        
        $fields = array_keys(array("Id" => null, "CreatedDateTime" => null, "UpdatedDateTime" => null));
            
        $temp_fields = array();

        $final_fields = array();
        
        $query_fields = "";

        foreach ($fields as $field) {
            preg_match_all('/((?:^|[A-Z])[a-z]+)/', $field, $temp_fields);
            
            $final_fields[] = strtolower(implode("_", $temp_fields[0]));

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

        var_dump($query);
    }
    
}