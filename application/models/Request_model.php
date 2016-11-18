<?php

class Request_model extends CI_Model {
    
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
    
    public function get_customer_ids($customer_id = null) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "customer_id, "
                    . "from customer ";
        
        if (!empty($customer_id)) {
            $query .= "where customer_id = {$customer_id} ";
        }
        
        return $db_handler->query($query)->result_array();
    }
    
    public function save_request($request) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "request_created_date_time" => date("Y-m-d H:i:s"),
            "request_transaction_type_id" => $request["transaction_type"],
            "request_user_id" => 1,
            "request_customer_id" => 1,
            "request_sqm_from" => $request["sqm_from"],
            "request_sqm_to" => $request["sqm_to"],
            "request_price_from" => $request["price_from"],
            "request_price_to" => $request["price_to"],
            "request_furnished" => ($request["is_furnished"] === "true" ? 1 : 0),
            "request_balcony_sqm_from" => $request["balcony_sqm_from"],
            "request_balcony_sqm_to" => $request["balcony_sqm_to"],
            "request_garden_sqm_from" => $request["garden_sqm_from"],
            "request_garden_sqm_to" => $request["garden_sqm_to"],
            "request_floor" => $request["property_floor"],
            "request_levels" => $request["property_levels"],
            "request_fireplace" => $request["fireplace_no"],
            "request_air_condition" => $request["aircondition_no"],
            "request_pool_sqm_from" => $request["pool_sqm_from"],
            "request_pool_sqm_to" => $request["pool_sqm_to"]
        );
        
        $db_handler->insert("request", $data);
        
        $request_id = $db_handler->insert_id();
        
        $this->refresh_request_aux_data($request_id, $request);
        
        return $request_id;
    }
    
    public function update_request($request) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "request_updated_date_time" => date("Y-m-d H:i:s"),
            "request_transaction_type_id" => $request["transaction_type"],
            "request_user_id" => 1,
            "request_customer_id" => 1,
            "request_sqm_from" => $request["sqm_from"],
            "request_sqm_to" => $request["sqm_to"],
            "request_price_from" => $request["price_from"],
            "request_price_to" => $request["price_to"],
            "request_furnished" => ($request["is_furnished"] === "true" ? 1 : 0),
            "request_balcony_sqm_from" => $request["balcony_sqm_from"],
            "request_balcony_sqm_to" => $request["balcony_sqm_to"],
            "request_garden_sqm_from" => $request["garden_sqm_from"],
            "request_garden_sqm_to" => $request["garden_sqm_to"],
            "request_floor" => $request["property_floor"],
            "request_levels" => $request["property_levels"],
            "request_fireplace" => $request["fireplace_no"],
            "request_air_condition" => $request["aircondition_no"],
            "request_pool_sqm_from" => $request["pool_sqm_from"],
            "request_pool_sqm_to" => $request["pool_sqm_to"]
        );
                
        $db_handler->where('request_id', $request["request_id"]);
        $db_handler->update('request', $data); 
        
        return $request["request_id"];
    }
    
    public function refresh_request_aux_data($request_id, $request) {
        $db_handler = $this->load_db_object();
        
        $db_handler->delete('request_type', array('request_type_request_id' => $request_id)); 
        $db_handler->delete('request_status', array('request_status_request_id' => $request_id)); 
        $db_handler->delete('request_prefecture', array('request_prefecture_request_id' => $request_id)); 
        $db_handler->delete('request_municipality', array('request_municipality_request_id' => $request_id)); 
        $db_handler->delete('request_area', array('request_area_request_id' => $request_id)); 
        $db_handler->delete('request_heating', array('request_heating_request_id' => $request_id)); 
        
        $property_type_data = array();
        $property_status_data = array();
        $prefecture_data = array();
        $municipality_data = array();
        $area_data = array();
        $heating_data = array();
        
        foreach ($request["property_type"] as $property_type) {
            $property_type_data[] = array(
                "request_type_request_id" => $request_id,
                "request_type_property_type_id" => $property_type
            );
        }
        
        foreach ($request["property_status"] as $property_status) {
            $property_status_data[] = array(
                "request_status_request_id" => $request_id,
                "request_status_status_id" => $property_status
            );
        }
        
        foreach ($request["prefecture_id"] as $prefecture) {
            $prefecture_data[] = array(
                "request_prefecture_request_id" => $request_id,
                "request_prefecture_prefecture_id" => $prefecture
            );
        }
        
        foreach ($request["municipality_id"] as $municipality) {
            $municipality_data[] = array(
                "request_municipality_request_id" => $request_id,
                "request_municipality_municipality_id" => $municipality
            );
        }
        
        foreach ($request["area_id"] as $area) {
            $area_data[] = array(
                "request_area_request_id" => $request_id,
                "request_area_area_id" => $area
            );
        }
        
        foreach ($request["heating"] as $heating) {
            $heating_data[] = array(
                "request_heating_request_id" => $request_id,
                "request_heating_heating_id" => $heating
            );
        }
        
        $db_handler->insert_batch("request_type", $property_type_data);
        $db_handler->insert_batch("request_status", $property_status_data);
        $db_handler->insert_batch("request_prefecture", $prefecture_data);
        $db_handler->insert_batch("request_municipality", $municipality_data);
        $db_handler->insert_batch("request_area", $area_data);
        $db_handler->insert_batch("request_heating", $heating_data);
    }
    
    public function get_request_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $request_query = "select "
                    . "request_id, "
                    . "request_transaction_type_id, "
                    . "request_sqm_from, "
                    . "request_sqm_to, "
                    . "request_price_from, "
                    . "request_price_to, "
                    . "request_furnished, "
                    . "request_balcony_sqm_from, "
                    . "request_balcony_sqm_to, "
                    . "request_garden_sqm_from, "
                    . "request_garden_sqm_to, "
                    . "request_floor, "
                    . "request_levels, "
                    . "request_fireplace, "
                    . "request_air_condition, "
                    . "request_pool_sqm_from, "
                    . "request_pool_sqm_to "
                . "from request "
                . "where request_id = {$request_id} ";
                
        $request_result = $db_handler->query($request_query)->row_array();
        
        return $request_result;
    }
    
    public function get_request_type_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_type_property_type_id "
                . "from request_type "
                . "where request_type_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_type_property_type_id"];
        }
        
        return $result_array;
    }
    
    public function get_request_status_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_status_status_id "
                . "from request_status "
                . "where request_status_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_status_status_id"];
        }
        
        return $result_array;
    }
    
    public function get_request_prefecture_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_prefecture_prefecture_id "
                . "from request_prefecture "
                . "where request_prefecture_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_prefecture_prefecture_id"];
        }
        
        return $result_array;
    }
    
    public function get_request_municipality_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_municipality_municipality_id "
                . "from request_municipality "
                . "where request_municipality_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_municipality_municipality_id"];
        }
        
        return $result_array;
    }
    
    public function get_request_area_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_area_area_id "
                . "from request_area "
                . "where request_area_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_area_area_id"];
        }
        
        return $result_array;
    }
    
    public function get_request_heating_data($request_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                    . "request_heating_heating_id "
                . "from request_heating "
                . "where request_heating_request_id = {$request_id} ";
                
        $result = $db_handler->query($query)->result_array();
        
        $result_array = array();
        
        foreach ($result as $row) {
            $result_array[] = $row["request_heating_heating_id"];
        }
        
        return $result_array;
    }
     
}