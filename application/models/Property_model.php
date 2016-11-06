<?php

class Property_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
    
    public function get_prefectures($prefecture_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "prefecture_id, "
                    . "prefecture_label, "
                    . "prefecture_latitude, "
                    . "prefecture_longitude, "
                    . "prefecture_zoom, "
                    . "prefecture_radius "
                . "from prefecture ";
        
        if (!empty($prefecture_id)) {
            $query .= "where prefecture_id = {$prefecture_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    } 
    
    public function get_municipalities($prefecture_id = null, $municipality_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "municipality_id, "
                    . "municipality_label, "
                    . "municipality_latitude, "
                    . "municipality_longitude, "
                    . "municipality_zoom, "
                    . "municipality_radius "
                . "from municipality "
                . "where 1 ";
        
        if (!empty($prefecture_id)) {
            $query .= "and municipality_prefecture_id = {$prefecture_id} ";
        }
        
        if (!empty($municipality_id)) {
            $query .= "and municipality_id = {$municipality_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_areas($municipality_id = null, $area_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "area_id, "
                    . "area_label, "
                    . "area_latitude, "
                    . "area_longitude, "
                    . "area_zoom, "
                    . "area_radius "
                . "from area "
                . "where 1 ";
        
        if (!empty($municipality_id)) {
            $query .= "and area_municipality_id = {$municipality_id} ";
        }
        
        if (!empty($area_id)) {
            $query .= "and area_id = {$area_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_transaction_types($transaction_type_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "transaction_type_id, "
                . "transaction_type_label "
                . "from transaction_type "
                . "where transaction_type_id > 0 ";
        
        if (!empty($transaction_type_id)) {
            $query .= "and transaction_type_id = {$transaction_type_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_property_types($property_type_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "property_type_id, "
                . "property_type_label "
                . "from property_type "
                . "where property_type_id > 0 ";
        
        if (!empty($property_type_id)) {
            $query .= "and property_type_id = {$property_type_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_property_statuses($property_status_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "property_status_id, "
                . "property_status_label "
                . "from property_status "
                . "where property_status_id > 0 ";
        
        if (!empty($property_status_id)) {
            $query .= "where property_status_id = {$property_status_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function get_heatings($heating_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "heating_id, "
                . "heating_label "
                . "from heating "
                . "where heating_id > 0 ";
        
        if (!empty($heating_id)) {
            $query .= "and heating_id = {$heating_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
      
}