<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common {
    
    public function delete_item($table_name, $item_id) {
        $CI = &get_instance();
        
        $data = array(
            "{$table_name}_{$table_name}_status_id" => -1
        );
            
        $CI->db->where("{$table_name}_id", $item_id);
        $CI->db->update("{$table_name}", $data);
    }
    
} 