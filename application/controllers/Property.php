<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {
    
    public function test() {
        $this->load->model("Property_model");
        
        $test = $this->Property_model->test_db();
        
        $this->load->view("property_view", array("test" => $test));
    }
    
    public function test2() {
        echo "test20";
    }
    
}