<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library("session");
        
        if ($this->session->has_userdata('username')) {
            header('Location: ' . base_url() . '');
        }
    }

    public function index() {
        $this->load->model("Login_model");

        $content_data = array();

        $data = array(
            "head_view" => $this->load->view("general/head", array(), true),
            "header_view" => $this->load->view("general/header", array("header_title" => "Είσοδος στο σύστημα"), true),
            "content_view" => $this->load->view("login/login_page", $content_data, true),
            "side_view" => $this->load->view("general/side", array(), true),
            "footer_view" => $this->load->view("general/footer", array(), true),
            "foot_view" => $this->load->view("general/foot", array(), true)
        );

        $this->load->view("general/main", $data);
    }

    public function login_auth() {
        $this->load->model("Login_model");

        if (!$this->input->post("username") || !$this->input->post("password")) {
            echo 1001;
        }

        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $login_result = $this->Login_model->logUserIn($username, $password);

        if (!empty($login_result)) {
            $newdata = array(
                "first_name"    => "{$login_result["user_name"]}",
                "last_name"     => "{$login_result["user_lastname"]}",
                "username"      => "{$login_result["user_username"]}",
                "is_admin"      => $login_result["user_isadmin"]
            );

            $this->session->set_userdata($newdata);

            echo 1;
        } else {
            echo 1010;
        }
    }
    
    public function logout_auth() {
        if ($this->session->has_userdata("username")) {
            $this->session->sess_destroy();
        }
    }

}
