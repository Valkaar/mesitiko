<?php

class Geography_model extends CI_Model {
    
    public function load_db_object() {
        return $this->load->database("default", true);
    }
    
    public function save_prefecture($prefecture) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "prefecture_label" => $prefecture["prefecture_label"],
            "prefecture_latitude" => $prefecture["prefecture_latitude"],
            "prefecture_longitude" => $prefecture["prefecture_longitude"],
            "prefecture_zoom" => $prefecture["prefecture_zoom"],
            "prefecture_radius" => $prefecture["prefecture_radius"]
        );
        
        $db_handler->insert("prefecture", $data);
        
        $prefecture_id = $db_handler->insert_id();
        
        return $prefecture_id;
    }
    
    public function save_municipality($municipality) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "municipality_label" => $municipality["municipality_label"],
            "municipality_latitude" => $municipality["municipality_latitude"],
            "municipality_longitude" => $municipality["municipality_longitude"],
            "municipality_zoom" => $municipality["municipality_zoom"],
            "municipality_radius" => $municipality["municipality_radius"],
            "municipality_prefecture_id" => $municipality["municipality_prefecture_id"]
        );
        
        $db_handler->insert("municipality", $data);
        
        $municipality_id = $db_handler->insert_id();
        
        return $municipality_id;
    }
    
    public function save_area($area) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "area_label" => $area["area_label"],
            "area_latitude" => $area["area_latitude"],
            "area_longitude" => $area["area_longitude"],
            "area_zoom" => $area["area_zoom"],
            "area_radius" => $area["area_radius"],
            "area_municipality_id" => $area["area_municipality_id"]
        );
        
        $db_handler->insert("area", $data);
        
        $area_id = $db_handler->insert_id();
        
        return $area_id;
    }
    
    public function update_prefecture($prefecture) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "prefecture_label" => $prefecture["prefecture_label"],
            "prefecture_latitude" => $prefecture["prefecture_latitude"],
            "prefecture_longitude" => $prefecture["prefecture_longitude"],
            "prefecture_zoom" => $prefecture["prefecture_zoom"],
            "prefecture_radius" => $prefecture["prefecture_radius"]
        );
                
        $db_handler->where('prefecture_id', $prefecture["prefecture_id"]);
        $db_handler->update('prefecture', $data); 
        
        return $prefecture["prefecture_id"];
    }
    
    public function update_municipality($municipality) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "municipality_label" => $municipality["municipality_label"],
            "municipality_latitude" => $municipality["municipality_latitude"],
            "municipality_longitude" => $municipality["municipality_longitude"],
            "municipality_zoom" => $municipality["municipality_zoom"],
            "municipality_radius" => $municipality["municipality_radius"],
            "municipality_prefecture_id" => $municipality["municipality_prefecture_id"]
        );
                
        $db_handler->where('municipality_id', $municipality["municipality_id"]);
        $db_handler->update('municipality', $data); 
        
        return $municipality["municipality_id"];
    }
    
    public function update_area($area) {
        $db_handler = $this->load_db_object();
        
        $data = array(
            "area_label" => $area["area_label"],
            "area_latitude" => $area["area_latitude"],
            "area_longitude" => $area["area_longitude"],
            "area_zoom" => $area["area_zoom"],
            "area_radius" => $area["area_radius"],
            "area_municipality_id" => $area["area_municipality_id"]
        );
                
        $db_handler->where('area_id', $area["area_id"]);
        $db_handler->update('area', $data); 
        
        return $area["area_id"];
    }
    
    public function get_prefecture_data($prefecture_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "prefecture_id, "
                . "prefecture_label, "
                . "prefecture_latitude, "
                . "prefecture_longitude, "
                . "prefecture_zoom, "
                . "prefecture_radius "
                . "from prefecture "
                . "where prefecture_id = {$prefecture_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
    
    public function get_municipality_data($municipality_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "municipality_id, "
                . "municipality_label, "
                . "municipality_latitude, "
                . "municipality_longitude, "
                . "municipality_zoom, "
                . "municipality_radius, "
                . "municipality_prefecture_id "
                . "from municipality "
                . "where municipality_id = {$municipality_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
    
    public function get_area_data($area_id) {
        $db_handler = $this->load_db_object();
        
        $query = "select "
                . "area_id, "
                . "area_label, "
                . "area_latitude, "
                . "area_longitude, "
                . "area_zoom, "
                . "area_radius, "
                . "area_municipality_id "
                . "from area "
                . "where area_id = {$area_id} ";
                
        $result = $db_handler->query($query)->row_array();
        
        return $result;
    }
    
    public function fetch_prefecture_list() {
        $db_handler = $this->load_db_object();
        
        $prefecture_query = "select "
                            . "'' as prefecture_checked, "
                            . "p.prefecture_id as prefecture_id, "
                            . "p.prefecture_label as prefecture_label, "
                            . "'' as prefecture_actions "
                        . "from prefecture p";
        
        $prefecture_result = $db_handler->query($prefecture_query)->result_array();
        
        return json_encode(array("data" => $prefecture_result));
    }
    
    public function fetch_municipality_list() {
        $db_handler = $this->load_db_object();
        
        $municipality_query = "select "
                            . "'' as municipality_checked, "
                            . "m.municipality_id as municipality_id, "
                            . "m.municipality_label as municipality_label, "
                            . "p.prefecture_label as municipality_prefecture, "
                            . "'' as municipality_actions "
                        . "from municipality m "
                            . "join prefecture p on m.municipality_prefecture_id = p.prefecture_id";
        
        $municipality_result = $db_handler->query($municipality_query)->result_array();
        
        return json_encode(array("data" => $municipality_result));
    }
    
    public function fetch_area_list() {
        $db_handler = $this->load_db_object();
        
        $area_query = "select "
                            . "'' as area_checked, "
                            . "a.area_id as area_id, "
                            . "a.area_label as area_label, "
                            . "m.municipality_label as area_municipality, "
                            . "p.prefecture_label as area_prefecture, "
                            . "'' as area_actions "
                        . "from area a "
                            . "join municipality m on a.area_municipality_id = m.municipality_id "
                            . "join prefecture p on m.municipality_prefecture_id = p.prefecture_id";
        
        $area_result = $db_handler->query($area_query)->result_array();
        
        return json_encode(array("data" => $area_result));
    }
    
}