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
    
    public function save_property() {
        $db_handler = $this->load_db_object();
        
        $property = $this->input->post("property");
        
        $data = array(
            "property_created_date_time" => date("Y-m-d H:i:s"),
            "property_property_status_id" => $property["property_status"],
            "property_property_type_id" => $property["property_type"],
            "property_transaction_type_id" => $property["transaction_type"],
            "property_heating_id" => $property["heating_id"],
            "property_prefecture_id" => $property["property_prefecture"],
            "property_municipality_id" => $property["property_municipality"],
            "property_area_id" => $property["property_area"],
            "property_sqm" => $property["property_sqm"],
            "property_price" => $property["property_price"],
            "property_description" => $property["property_description"],
            "property_label" => $property["property_label"],
            "property_address" => $property["property_address"],
            "property_address_no" => $property["property_address_no"],
            "property_furnished" => $property["property_furnished"],
            "property_balcony_sqm" => $property["property_balcony_sqm"],
            "property_garden_sqm" => $property["property_garden_sqm"],
            "property_floor" => $property["property_floor"],
            "property_levels" => $property["property_levels"],
            "property_fireplace" => $property["property_fireplace"],
            "propery_air_condition" => $property["propery_air_condition"],
            "property_user_id" => 1
        );
        
        $db_handler->insert("property", $data);
        
        $property_id = $db_handler->insert_id();
        
        return $property_id;
    }
    
    public function update_property($property) {
        $db_handler = $this->load_db_object();
        
        $property = $this->input->post("property");
        
        $data = array(
            "property_updated_date_time" => date("Y-m-d H:i:s"),
            "property_property_status_id" => $property["property_status"],
            "property_property_type_id" => $property["property_type"],
            "property_transaction_type_id" => $property["transaction_type"],
            "property_heating_id" => $property["heating_id"],
            "property_prefecture_id" => $property["property_prefecture"],
            "property_municipality_id" => $property["property_municipality"],
            "property_area_id" => $property["property_area"],
            "property_sqm" => $property["property_sqm"],
            "property_price" => $property["property_price"],
            "property_description" => $property["property_description"],
            "property_label" => $property["property_label"],
            "property_address" => $property["property_address"],
            "property_address_no" => $property["property_address_no"],
            "property_furnished" => $property["property_furnished"],
            "property_balcony_sqm" => $property["property_balcony_sqm"],
            "property_garden_sqm" => $property["property_garden_sqm"],
            "property_floor" => $property["property_floor"],
            "property_levels" => $property["property_levels"],
            "property_fireplace" => $property["property_fireplace"],
            "propery_air_condition" => $property["propery_air_condition"]
        );
                
        $db_handler->where('property_id', $property["property_id"]);
        $db_handler->update('property', $data); 
        
        return $property["property_id"];
    }
    
    public function fetch_property_list() {
        $db_handler = $this->load_db_object();
        
        $property_query = "select "
                                . "'' as 'property_checked', "
                                . "p.property_id as 'property_id', "
                                . "pt.property_type_label as 'property_type', "
                                . "tt.transaction_type_label as 'property_transaction_type', "
                                . "pr.prefecture_label as 'property_prefecture', "
                                . "mu.municipality_label as 'property_municipality',  "
                                . "ar.area_label as 'property_area', "
                                . "p.property_sqm as 'property_sqm', "
                                . "p.property_price as 'property_price', "
                                . "'' as 'property_actions' "
                            . "from real_estate.property p " 
                                . "join real_estate.property_type pt on p.property_property_type_id = pt.property_type_id "
                                . "join real_estate.transaction_type tt on p.property_transaction_type_id = tt.transaction_type_id "
                                . "join real_estate.prefecture pr on p.property_prefecture_id = pr.prefecture_id "
                                . "join real_estate.municipality mu on p.property_municipality_id = mu.municipality_id "
                                . "join real_estate.area ar on p.property_area_id = ar.area_id";
        
        $property_result = $db_handler->query($property_query)->result_array();
        
        return json_encode(array("data" => $property_result));
    }
    
    public function get_property_data($property_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "p.property_id, "
                    . "p.property_property_status_id, "
                    . "p.property_property_type_id, "
                    . "p.property_transaction_type_id, "
                    . "p.property_heating_id, "
                    . "p.property_prefecture_id, "
                    . "p.property_municipality_id, "
                    . "p.property_area_id, "
                    . "p.property_sqm, "
                    . "p.property_price, "
                    . "p.property_description, "
                    . "p.property_label, "
                    . "p.property_address, "
                    . "p.property_address_no, "
                    . "p.property_furnished, "
                    . "p.property_balcony_sqm, "
                    . "p.property_garden_sqm, "
                    . "p.property_floor, "
                    . "p.property_levels, "
                    . "p.property_fireplace, "
                    . "p.propery_air_condition, "
                    . "p.property_pool_sqm "
                . "from real_estate.property p "
                . "where p.property_id = {$property_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
      
}