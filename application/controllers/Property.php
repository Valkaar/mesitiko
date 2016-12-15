<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->session->has_userdata('username')) {
            header('Location: ' . base_url() . 'login');
        }
    }

    public function add_property() {
        $this->load->model("Property_model");

        $content_data = array(
            "prefectures" => $this->Property_model->get_prefectures(),
            "municipalities" => $this->Property_model->get_municipalities(),
            "areas" => $this->Property_model->get_areas(),
            "transaction_types" => $this->Property_model->get_transaction_types(),
            "property_types" => $this->Property_model->get_property_types(),
            "property_statuses" => $this->Property_model->get_property_statuses(),
            "heatings" => $this->Property_model->get_heatings()
        );


        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Προσθήκη ακινήτου"), true),
            "content_view" => $this->load->view("property/add_property", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }

    public function edit_property($property_id) {
        $this->load->model("Property_model");

        $content_data = array(
            "prefectures" => $this->Property_model->get_prefectures(),
            "municipalities" => $this->Property_model->get_municipalities(),
            "areas" => $this->Property_model->get_areas(),
            "transaction_types" => $this->Property_model->get_transaction_types(),
            "property_types" => $this->Property_model->get_property_types(),
            "property_statuses" => $this->Property_model->get_property_statuses(),
            "heatings" => $this->Property_model->get_heatings(),
            "property_data" => $this->Property_model->get_property_data($property_id)
        );


        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Επεξεργασία ακινήτου"), true),
            "content_view" => $this->load->view("property/add_property", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }

    public function property_list() {
        $this->load->model("Property_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Λίστα ακινήτων"), true),
            "content_view" => $this->load->view("property/property_list", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }

    public function save_property() {
        $this->load->model("Property_model");

        //$this->input->post(); //isodynamei me $_POST
        if (!$this->input->post("property")) { //isodynamei me $_POST["property"]
            echo 10000001;
            return;
        }

        $property = $this->input->post("property");

        if (empty($property["is_edit"])) {
            $result = $this->Property_model->save_property($property);
        } else {
            $result = $this->Property_model->update_property($property);
        }

        if (empty($result)) {
            echo 10000010;
        } else if ($result === -1) {
            echo 10000011;
        } else {
            echo $result;
        }
    }

    public function get_properties_list() {
        $this->load->model("Property_model");

        $property_list = $this->Property_model->fetch_property_list();

        echo $property_list;
    }

    public function upload_files() {
        $this->load->model("Property_model");
        $property_id = $this->input->post("property_id");

        if (!file_exists("assets/uploaded_files/{$property_id}/")) {
            mkdir("assets/uploaded_files/{$property_id}/", 0777, true);
        }

        $config = array(
            'upload_path' => "assets/uploaded_files/{$property_id}/",
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 10000,
            'max_width' => 2048,
            'max_height' => 1536
        );

        $this->load->library('upload', $config);

        if (!file_exists("assets/uploaded_files/{$property_id}/{$_FILES["file"]["name"]}")) {
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                
                $this->Property_model->save_file_in_db($property_id, $_FILES["file"]["name"]);
                        
                
            }
        }
    }

    public function get_existing_files() {
        $property_id = $this->input->get("property_id");
        
        $result = array();

        $files = scandir("assets/uploaded_files/{$property_id}/");
        if (false !== $files) {
            foreach ($files as $file) {
                if ('.' != $file && '..' != $file) {
                    $obj['name'] = $file;
                    $obj['size'] = filesize("assets/uploaded_files/{$property_id}/" . $file);
                    $result[] = $obj;
                }
            }
        }
        
        header('Content-type: text/json');
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
    public function delete_property() {
        $this->load->library("Common");
        
        $this->common->delete_item("property", $this->input->post("property_id"));
    }

}
