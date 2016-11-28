<?php

class Geography extends CI_Controller {
    
    public function add_prefecture() {
        $this->load->model("Geography_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη νομού"), true),
            "content_view" => $this->load->view("geography/add_prefecture", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function edit_prefecture($prefecture_id) {
        $this->load->model("Geography_model");

        $content_data = array("prefecture_data" => $this->Geography_model->get_prefecture_data($prefecture_id));

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη νομού"), true),
            "content_view" => $this->load->view("geography/add_prefecture", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function add_municipality() {
        $this->load->model("Geography_model");
        $this->load->model("Property_model");

        $content_data = array(
            "prefectures" => $this->Property_model->get_prefectures()
        );

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη δήμου"), true),
            "content_view" => $this->load->view("geography/add_municipality", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function edit_municipality($municipality_id) {
        $this->load->model("Geography_model");
        $this->load->model("Property_model");

        $content_data = array(
            "municipality_data" => $this->Geography_model->get_municipality_data($municipality_id),
            "prefectures" => $this->Property_model->get_prefectures()
        );

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη νομού"), true),
            "content_view" => $this->load->view("geography/add_municipality", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function add_area() {
        $this->load->model("Geography_model");
        $this->load->model("Property_model");

        $content_data = array(
            "municipalities" => $this->Property_model->get_municipalities()
        );

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη περιοχής"), true),
            "content_view" => $this->load->view("geography/add_area", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function edit_area($area_id) {
        $this->load->model("Geography_model");
        $this->load->model("Property_model");

        $content_data = array(
            "area_data" => $this->Geography_model->get_area_data($area_id),
            "municipalities" => $this->Property_model->get_municipalities()
        );

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη νομού"), true),
            "content_view" => $this->load->view("geography/add_area", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function prefecture_list() {
        $this->load->model("Geography_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Λίστα νομών"), true),
            "content_view" => $this->load->view("geography/prefecture_list", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function municipality_list() {
        $this->load->model("Geography_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Λίστα δήμων"), true),
            "content_view" => $this->load->view("geography/municipality_list", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function area_list() {
        $this->load->model("Geography_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Λίστα περιοχών"), true),
            "content_view" => $this->load->view("geography/area_list", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }
    
    public function save_prefecture() {
        $this->load->model("Geography_model");
        
        if (!$this->input->post("prefecture")) {
            echo 10000001;
            return;
        }
        
        $prefecture = $this->input->post("prefecture");
        
        if (empty($prefecture["is_edit"])) {
            $result = $this->Geography_model->save_prefecture($prefecture);
        } else {
            $result = $this->Geography_model->update_prefecture($prefecture);            
        }
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }
    
    public function save_municipality() {
        $this->load->model("Geography_model");
        
        if (!$this->input->post("municipality")) {
            echo 10000001;
            return;
        }
        
        $municipality = $this->input->post("municipality");
        
        if (empty($municipality["is_edit"])) {
            $result = $this->Geography_model->save_municipality($municipality);
        } else {
            $result = $this->Geography_model->update_municipality($municipality);            
        }
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }
    
    public function save_area() {
        $this->load->model("Geography_model");
        
        if (!$this->input->post("area")) {
            echo 10000001;
            return;
        }
        
        $area = $this->input->post("area");
        
        if (empty($area["is_edit"])) {
            $result = $this->Geography_model->save_area($area);
        } else {
            $result = $this->Geography_model->update_area($area);            
        }
        
        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }
    
    public function get_prefectures_list() {
        $this->load->model("Geography_model");
        
        $prefecture_list = $this->Geography_model->fetch_prefecture_list();
        
        echo $prefecture_list;
    }
    
    public function get_municipalities_list() {
        $this->load->model("Geography_model");
        
        $municipality_list = $this->Geography_model->fetch_municipality_list();
        
        echo $municipality_list;
    }
    
    public function get_areas_list() {
        $this->load->model("Geography_model");
        
        $area_list = $this->Geography_model->fetch_area_list();
        
        echo $area_list;
    }
    
}