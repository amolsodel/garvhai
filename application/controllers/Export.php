<?php

class Export extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Library
        $this->load->library("excel");
        $this->load->helper('url_helper');
        //$this->load->library('session');
        // Load the Model
        $this->load->model("admin_model");
    }

    public function export_data() {
        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using MY_Model.php
        $data = $this->admin_model->get_contact_us_user_data();
        //echo "<pre>"; print_r($data); exit();
        $this->excel->stream('user_data.xls', $data);
    }
    
}