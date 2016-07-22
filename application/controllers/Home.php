<?php
	class Home extends CI_Controller {
		function __construct()
        {
            parent::__construct();
            //$this->load->model('news_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->model('home_model');

        }

        public function index()
        {
            $data['title'] = 'Home';

            $player_url = $_SERVER['REQUEST_URI'];
            $player_url = explode('/', $player_url); 
            $player_url = array_filter($player_url);
            $player_url = array_merge($player_url, array()); 
            $player_url = preg_replace('/\?.*/', '', $player_url);
            $endofurl = isset($player_url[0]) ? $player_url[0] : "";
            if($endofurl != ''){
                $endofurl = explode('-', $endofurl);
                $data['playerNameID'] =  $this->home_model->get_player_id($endofurl[0]);
            }

            $data['records'] = $this->home_model->get_player_data();
            $data['videoRecords'] = $this->home_model->get_player_video();
            $data['mediaRecords'] = $this->home_model->get_player_modal_data('allmedia');
           // echo '<pre>';   print_r($data['records']); exit();
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        }

        public function player_model_data()
        {
            $mode = $this->input->post('mode');
            $player_id = $this->input->post('playerId'); 
            $data['modal_data'] = $this->home_model->get_player_modal_data($mode, $player_id);
            if(isset($data['modal_data'])){
                echo json_encode($data);
            }else{
                $data['status'] = 'Failuer';
                echo json_encode($data);
            }
        }

        public function player_filter_data()
        {
            $player_id = $this->input->post('playerId'); 
            $data['filter_data'] = $this->home_model->get_player_filter_data($player_id);
            if(isset($data['filter_data'])){
                echo json_encode($data);
            }else{
                $data['status'] = 'Failuer';
                echo json_encode($data);
            }
        }

        public function share_experience_data()
        {
            //print_r($this->input->post());
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['cmnt'] = $this->input->post('cmnt');

            $response = $this->home_model->user_share_data($data);
            if($response == true){
                echo json_encode('Thank you for your response!');
            }
            //var_dump($response);exit;
        }

        public function about($page = 'about')
        {
        if ( ! file_exists(APPPATH.'views/home/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('home/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
        public function terms_condition($page = 'terms_condition')
        {
        if ( ! file_exists(APPPATH.'views/home/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('home/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
    }