<?php
	class Admin extends CI_Controller {
		private $_uploaded;

		function __construct()
        {
            parent::__construct();
            //$this->load->model('news_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->model('admin_model');
        }

        public function index()
        {
            $data['title'] = 'Admin Login';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/admin_footer');
        }

        public function login(){
        	$data['title'] = 'Admin Dashbord';

        	$isuser = $this->admin_model->get_admin_user();
        	
        	if($isuser != NULL){
        		/*echo '<pre>';
        		print_r($isuser);
        		echo '</pre>';*/
        		$this->session->set_userdata('username', $isuser['user_name']);
        		$this->session->set_userdata('useremail', $isuser['user_email']);
        		/*$this->load->view('templates/admin_header', $data);
        		$this->load->view('admin/dashbord', $data);
            	$this->load->view('templates/admin_footer');*/
            	$this->dashbord();
        	}else{
        		$data['error'] = 'UserId password didn\'t match' ;

        		$this->load->view('templates/admin_header', $data);
	            $this->load->view('admin/index', $data);
	            $this->load->view('templates/admin_footer');
        	}
        }

        public function dashbord()
        {
        	if(isset($this->session->username)){
        		$data['title'] = 'Dashbord';

	            $data['players'] = $this->admin_model->get_players();

	            $this->load->view('templates/admin_header', $data);
	            $this->load->view('templates/admin_nav');
	    		$this->load->view('admin/dashbord', $data);
	    		$this->load->view('templates/nav_close');
	        	$this->load->view('templates/admin_footer');
        	}else{
        		$this->index();
        	}
        }

        public function logout(){
        	$this->session->sess_destroy();
        	$data['notice'] = 'You are logged out successfully!';
        	//$this->index();

        	$this->load->view('templates/admin_header', $data);
	        $this->load->view('admin/index', $data);
	        $this->load->view('templates/admin_footer');
        }

        public function add_player(){
        	if(isset($this->session->username)){
	        	$this->load->helper('form');
	            $this->load->library('form_validation');

	            $config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

	        	$this->load->library('upload', $config);

	        	$data['title'] = 'Add new player';

	        	$this->form_validation->set_rules('playername', 'Player name', 'required');
	            //$this->form_validation->set_rules('text', 'Text', 'required');

	            if ($this->form_validation->run() === FALSE)
	            {
	                $this->load->view('templates/admin_header');
		            $this->load->view('templates/admin_nav');
	                $this->load->view('admin/addplayer', $data);
		    		$this->load->view('templates/nav_close');
	                $this->load->view('templates/admin_footer');

	            }
	            else
	            {
	            	if( ! $this->upload->do_upload('userpic')){
	            		$data['error'] = $this->upload->display_errors();
	            		//print_r($error); exit;
						$this->load->view('templates/admin_header');
		            	$this->load->view('templates/admin_nav');
	            		$this->load->view('admin/addplayer', $data);
			    		$this->load->view('templates/nav_close');
		                $this->load->view('templates/admin_footer');
	            	}else
					{
						$data['upload_data'] = $this->upload->data();
						$this->admin_model->addplayer($data);
						$data['notice'] = 'Player added successfully!';
						$this->load->view('templates/admin_header');
		            	$this->load->view('templates/admin_nav');
						$this->load->view('admin/addplayer', $data);
			    		$this->load->view('templates/nav_close');
		                $this->load->view('templates/admin_footer');
					}
	            }
	        }else{
	        	redirect('/admin');
	        }
        }

        public function delete_player($slug)
        {
        	if(isset($this->session->username)){
	        	$delete_response = $this->admin_model->deleteplayer($slug);
	        	redirect('/admin/dashbord');
        	}else{
	        	redirect('/admin');
	        }
        }

        public function delete_media($media_id)
        {
        	$this->load->library('user_agent');
        	$delete_response = $this->admin_model->deletemedia($media_id);
        	redirect($this->agent->referrer());
        }

        public function edit_player($player_id = NULL, $upload_error = NULL)
        {
        	if(isset($this->session->username)){
	        	$data['title'] = 'Edit Player';
	        	$data['upload_error'] = urldecode($upload_error);
	        	$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

	        	$this->load->helper('form');
	            $this->load->library('form_validation');
	        	$this->load->library('upload', $config);

		        $data['player'] = $this->admin_model->get_players($player_id);

	            $this->load->view('templates/admin_header', $data);
	            $this->load->view('templates/admin_nav');
	    		$this->load->view('admin/addplayer', $data);
	    		$this->load->view('templates/nav_close');
	        	$this->load->view('templates/admin_footer');
	        }else{
	        	redirect('/admin');
	        }
        }

        public function update_player($player_id){
        	if(isset($this->session->username)){
	        	$data['title'] = 'Edit Player';
	        	$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

	        	$this->load->helper('form');
	            $this->load->library('form_validation');
	        	$this->load->library('upload', $config);

		        $this->form_validation->set_rules('playername', 'Player name', 'required');

		        if ($this->form_validation->run() === FALSE)
	            {
	            	redirect('admin/edit_player/'.$player_id);
	            }
	            else if( ! $this->upload->do_upload('userpic')){
	            	$uploadError = $this->upload->display_errors();
	            	if (strip_tags($uploadError) != 'You did not select a file to upload.'){
	            		redirect('admin/edit_player/'.$player_id.'/'.strip_tags($uploadError));
	            	}else{
		            	$data['upload_data'] = $this->upload->data();
		            	$data['player_id'] = $player_id;
						$update_response = $this->admin_model->updateplayer($data);
						if($update_response){
							redirect('admin/edit_player/'.$player_id.'/'.strip_tags("User profile updated successfully"));
						}
		            }
	            }else{
	            	$data['upload_data'] = $this->upload->data();
	            	$data['player_id'] = $player_id;
					$update_response = $this->admin_model->updateplayer($data);
					//var_dump($update_response);
					if($update_response){
						redirect('admin/edit_player/'.$player_id.'/'.strip_tags("User profile updated successfully"));
					}
	            }
	        }else{
	        	redirect('/admin');
	        }
        }

        public function add_media($player_id)
        {
        	if(isset($this->session->username)){
	        	$data['title'] = 'Add media for player';
	        	$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

		        $this->load->helper('form');
	            $this->load->library('form_validation');
	        	$this->load->library('upload', $config);

	        	//now we set a callback as rule for the upload field
	    		$this->form_validation->set_rules('uploadedimages[]','Upload image','callback_fileupload_check');

				if($this->input->post())
				{
				    //run the validation
					if($this->form_validation->run())
					{
						/*// for now let's just verify if all went ok with the upload...
						echo '<pre>';
						print_r($this->_uploaded);
						echo '</pre>';
						// from here on you can do whatever you wish with the uploaded data or the other form fields that you might have. I decided to exit here, since this is not the object of our tutorial.
						exit;*/
						$add_media_response = $this->admin_model->addplayermedia($this->_uploaded, $player_id);
						//var_dump($add_media_response);
						foreach ($add_media_response as $value) {
							if($value != true)
								$this->form_validation->set_message('playervideo', $value);
						}
						$this->form_validation->set_message('playervideo', 'Player data Added sccessfully');
						
						$this->load->view('templates/admin_header', $data);
			            $this->load->view('templates/admin_nav');
			        	$this->load->view('admin/addmedia',$data);
			    		$this->load->view('templates/nav_close');
			        	$this->load->view('templates/admin_footer');
					}
				}
				else
				{
					$this->load->view('templates/admin_header', $data);
		            $this->load->view('templates/admin_nav');
		        	$this->load->view('admin/addmedia',$data);
		    		$this->load->view('templates/nav_close');
		        	$this->load->view('templates/admin_footer');
				}
			}else{
	        	redirect('/admin');
	        }	
        }

        // now the callback validation that deals with the upload of files
		public function fileupload_check()
		{
			// we retrieve the number of files that were uploaded
			$number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);

			// considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
			$files = $_FILES['uploadedimages'];

			// first make sure that there is no error in uploading the files
			for($i=0;$i<$number_of_files;$i++)
			{
				if($_FILES['uploadedimages']['error'][$i] != 0)
				{
					// save the error message and return false, the validation of uploaded files failed
					$this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
					return FALSE;
				}
			}

			/*// we first load the upload library
			$this->load->library('upload');
			// next we pass the upload path for the images
			$config['upload_path'] = FCPATH . 'upload/';
			// also, we make sure we allow only certain type of images
			$config['allowed_types'] = 'gif|jpg|png';*/

			// now, taking into account that there can be more than one file, for each file we will have to do the upload
			$img_nm = '';
			for ($i = 0; $i < $number_of_files; $i++)
			{
				if($i == 0){
					$img_nm = $files['name'][0];
					$img_nm = explode('.', $img_nm);
					$img_nm = $img_nm[0].time().'.'.$img_nm[1];
				}else{
					$img_nm = explode('.', $img_nm);
					$img_nm = $img_nm[0].'-l.jpg';
				}
				$_FILES['uploadedimage']['name'] = $img_nm;
				$_FILES['uploadedimage']['type'] = $files['type'][$i];
				$_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['uploadedimage']['error'] = $files['error'][$i];
				$_FILES['uploadedimage']['size'] = $files['size'][$i];

				/*//now we initialize the upload library
				$this->upload->initialize($config);*/
				if ($this->upload->do_upload('uploadedimage'))
				{
					if($i == 0){
						$this->_uploaded[$i] = $this->upload->data();
					}
				}
				else
				{
					$this->form_validation->set_message('fileupload_check', $this->upload->display_errors());
					return FALSE;
				}
			}
			return TRUE;
		}

		public function add_images($player_id)
        {
        	if(isset($this->session->username)){
	        	$data['title'] = 'Add images for player';
	        	$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

		        $this->load->helper('form');
	            $this->load->library('form_validation');
	        	$this->load->library('upload', $config);

	        	//now we set a callback as rule for the upload field
	    		$this->form_validation->set_rules('uploadedimages[]','Upload image','callback_fileupload_check');

				if($this->input->post())
				{
				    //run the validation
					if($this->form_validation->run())
					{
						/*// for now let's just verify if all went ok with the upload...
						echo '<pre>';
						print_r($this->_uploaded);
						echo '</pre>';
						// from here on you can do whatever you wish with the uploaded data or the other form fields that you might have. I decided to exit here, since this is not the object of our tutorial.
						exit;*/
						$add_media_response = $this->admin_model->addplayerimages($this->_uploaded, $player_id);
						//var_dump($add_media_response);
						foreach ($add_media_response as $value) {
							if($value != true)
								$data['error'] = $value;
							//$this->form_validation->set_message('playervideo', $value);
						}
						//$this->form_validation->set_message('playervideo', 'Player data Added sccessfully');
						$data['success'] = 'Added Image(s) sccessfully!';
						$data['player_id'] = $player_id;
						
						$this->load->view('templates/admin_header', $data);
			            $this->load->view('templates/admin_nav');
			        	$this->load->view('admin/addimages',$data);
			    		$this->load->view('templates/nav_close');
			        	$this->load->view('templates/admin_footer');
					}else
					{
						$this->form_validation->set_message('fileupload_check', 'Please select file to upload!');
						$this->load->view('templates/admin_header', $data);
			            $this->load->view('templates/admin_nav');
			        	$this->load->view('admin/addimages',$data);
			    		$this->load->view('templates/nav_close');
			        	$this->load->view('templates/admin_footer');
					}
				}
				else
				{
					$this->load->view('templates/admin_header', $data);
		            $this->load->view('templates/admin_nav');
		        	$this->load->view('admin/addimages',$data);
		    		$this->load->view('templates/nav_close');
		        	$this->load->view('templates/admin_footer');
				}
			}else{
	        	redirect('/admin');
	        }	
        }

        public function view_images($plaayer_id)
        {
        	if(isset($this->session->username)){
	        	$data['player_id'] = $plaayer_id;
	        	$data['player_images'] = $this->admin_model->get_player_images($plaayer_id);

	        	if (empty($data['player_images']))
	            {
	                show_404();
	            }
	            /*echo '<pre>';
	            print_r($data['player_media']);
	            echo '<pre>';*/
	            $this->load->view('templates/admin_header', $data);
	            $this->load->view('templates/admin_nav');
	        	$this->load->view('admin/viewimages',$data['player_images']);
	    		$this->load->view('templates/nav_close');
	        	$this->load->view('templates/admin_footer');
	        }else{
	        	redirect('/admin');
	        }
        }

        Public function add_video($player_id)
        {
        	if(isset($this->session->username)){
	        	$data['player_id'] = $player_id;
	        	$data['title'] = 'Add video';
	        	$config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = '10000';
		        $config['max_width']  = '1024';
		        $config['max_height']  = '768';

		        $this->load->helper('form');
	            $this->load->library('form_validation');
	        	$this->load->library('upload', $config);

	        	if($this->input->post()){
	        		/*echo $this->input->post('videotitle');
	        		echo $this->input->post('playervideo');
	        		exit();*/
	        		if( ! $this->upload->do_upload('videothumb')){
	            		$data['error'] = $this->upload->display_errors();
	            		//print_r($error); exit;
						$this->load->view('templates/admin_header');
		            	$this->load->view('templates/admin_nav');
	            		$this->load->view('admin/addvideo', $data);
			    		$this->load->view('templates/nav_close');
		                $this->load->view('templates/admin_footer');
	            	}else
					{
						$data['upload_data'] = $this->upload->data();
						$this->admin_model->addvideo($data);
						$data['notice'] = 'Video added successfully!';
						$this->load->view('templates/admin_header');
		            	$this->load->view('templates/admin_nav');
						$this->load->view('admin/addvideo', $data);
			    		$this->load->view('templates/nav_close');
		                $this->load->view('templates/admin_footer');
					}

	        	}else{
	        		$this->load->view('templates/admin_header', $data);
		            $this->load->view('templates/admin_nav');
		        	$this->load->view('admin/addvideo',$data);
		    		$this->load->view('templates/nav_close');
		        	$this->load->view('templates/admin_footer');
	        	}
	        }else{
	        	redirect('/admin');
	        }
        }

        public function view_videos($plaayer_id)
        {
        	if(isset($this->session->username)){
	        	$data['player_id'] = $plaayer_id;
	        	$data['player_videos'] = $this->admin_model->get_player_videos($plaayer_id);

	        	if (empty($data['player_videos']))
	            {
	                show_404();
	            }
	            /*echo '<pre>';
	            print_r($data['player_videos']);
	            echo '<pre>';*/
	            $this->load->view('templates/admin_header', $data);
	            $this->load->view('templates/admin_nav');
	        	$this->load->view('admin/viewvideos',$data);
	    		$this->load->view('templates/nav_close');
	        	$this->load->view('templates/admin_footer');
        	}else{
	        	redirect('/admin');
	        }
        }

        public function add_social($player_id)
        {
        	if(isset($this->session->username)){
	        	$data['player_id'] = $player_id;
	        	$data['title'] = 'Add News';

	        	$this->load->helper('form');
	            $this->load->library('form_validation');
	        	//echo 'hi';

	        	if($this->input->post()){
	        		$news_response = $this->admin_model->addsocial($player_id);
	        		//print_r($news_response);
	        		if($news_response == true)
	        			$data['success'] = 'News Created successfully!';
	        		else
	        			$data['error'] = $news_response;

	        		$this->load->view('templates/admin_header', $data);
		            $this->load->view('templates/admin_nav');
		        	$this->load->view('admin/addsocial',$data);
		    		$this->load->view('templates/nav_close');
		        	$this->load->view('templates/admin_footer');

	        	}else{
	        		$this->load->view('templates/admin_header', $data);
		            $this->load->view('templates/admin_nav');
		        	$this->load->view('admin/addsocial',$data);
		    		$this->load->view('templates/nav_close');
		        	$this->load->view('templates/admin_footer');
	        	}
	        }else{
	        	redirect('/admin');
	        }
	        	
        }

        public function view_social($player_id)
        {
        	if(isset($this->session->username)){
	        	$data['player_social'] = $this->admin_model->get_player_social($player_id);
	        	$data['player_id'] = $player_id;

	        	/*echo '<pre>';
	            print_r($data['player_social']);
	            echo '<pre>';
	            exit;*/

	        	if (empty($data['player_social']))
	            {
	                show_404();
	            }

	            $this->load->view('templates/admin_header', $data);
	            $this->load->view('templates/admin_nav');
	        	$this->load->view('admin/viewsocial',$data);
	    		$this->load->view('templates/nav_close');
	        	$this->load->view('templates/admin_footer');
        	}else{
	        	redirect('/admin');
	        }
        }

	}