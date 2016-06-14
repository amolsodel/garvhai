<?php
class Admin_model extends CI_Model {
    private $_result;

    public function __construct()
    {
            $this->load->database();
    }

    public function get_admin_user()
	{
        $this->load->helper('url');

        $username = $this->input->post('userEmail');
        $userpass = $this->input->post('userPass');

        $query = $this->db->get_where('garvhai_adminuser', array('user_email' => $username, 'user_pass' => md5($userpass)));
        return $query->row_array();
	}

    public function get_players($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('id, name');
            $query = $this->db->get('garvhai_players');
            return $query->result_array();
        }
        $query = $this->db->get_where('garvhai_players', array('id' => $slug));
        return $query->row_array();
    }


    public function get_table()
    {
        $query = $this->db->query('SELECT * FROM news');
        /*var_dump($query->result_array());
        exit;*/
        return $query->result_array();
    }

    public function addplayer($upload_data)
    {
        $this->load->helper('url');
        if($this->input->post('olympic_qulified') != '')
            $olympic_qulified = 1;
        else
            $olympic_qulified = 0;

        $data = array(
            'name' => $this->input->post('playername'),
            'profile_photo' => $upload_data['upload_data']['file_name'],
            'contest' => $this->input->post('contest'),
            'championship' => $this->input->post('championship'),
            'olympic_qulified' => $olympic_qulified
            //'slug' => $slug,
            //'text' => $this->input->post('text')
        );

        return $this->db->insert('garvhai_players', $data);
    }

    public function deleteplayer($player_id)
    {
        return $this->db->delete('garvhai_players', array('id' => $player_id)); 
    }

    public function deletemedia($media_id)
    {
        return $this->db->delete('garvhai_players_media', array('id' => $media_id)); 
    }

    public function updateplayer($update_data){
        $this->load->helper('url');
        if($this->input->post('olympic_qulified') != '')
            $olympic_qulified = 1;
        else
            $olympic_qulified = 0;

        $data = array(
            'name' => $this->input->post('playername'),
            'contest' => $this->input->post('contest'),
            'championship' => $this->input->post('championship'),
            'olympic_qulified' => $olympic_qulified
        );
        if(isset($update_data['upload_data']['file_name']) && $update_data['upload_data']['file_name'] != ''){
            $data['profile_photo'] = $update_data['upload_data']['file_name'];
        }

        $this->db->where('id', $update_data['player_id']);
        return $this->db->update('garvhai_players', $data); 
        //print_r($update_data['player_id']);exit;
    }

    public function addplayermedia($upload_data, $player_id)
    {
        /*foreach ($this->input->post() as $key => $value) {
            echo $key .'=>'. $value;
        }
        echo $player_id;exit;*/
        $this->load->helper('url');
        foreach ($upload_data as $player_image) {
            $data = array(
                'player_id' => $player_id,
                'type' => 'image',
                'media_value' => $player_image['file_name']
                //'slug' => $slug,
                //'text' => $this->input->post('text')
            );
            $_result[] = $this->db->insert('garvhai_players_media', $data);
            if(!current($_result))
                return $this->$db->_error_message();
        }

        foreach ($this->input->post() as $media => $value) {
            //echo $media .'=>'. $value;
            $type = strpos($media, 'video') ? 'video' : 'social';

            if($media != 'submit'){
                $data = array(
                    'player_id' => $player_id,
                    'type' => $type,
                    'media_value' => $value
                    //'slug' => $slug,
                    //'text' => $this->input->post('text')
                );
                $_result[] = $this->db->insert('garvhai_players_media', $data);
                if(!current($_result))
                    return $this->$db->_error_message();
            }
        }
        return $_result;
    }

    public function addplayerimages($upload_data, $player_id)
    {
        //print_r($upload_data);exit;
        $this->load->helper('url');
        foreach ($upload_data as $player_image) {
            $data = array(
                'player_id' => $player_id,
                'type' => 'image',
                'media_value' => $player_image['file_name']
                //'slug' => $slug,
                //'text' => $this->input->post('text')
            );
            
            $_result[] = $this->db->insert('garvhai_players_media', $data);
            if(!current($_result))
                return $this->$db->_error_message();
        }
        return $_result;
    }

    public function get_player_images($player_id)
    {
        //$this->db->group_by('type');
        $query = $this->db->get_where('garvhai_players_media', array('player_id' => $player_id, 'type' => 'image'));
        $data['images'] = $query->result_array();

        return $data;
    }

    public function addvideo($upload_data)
    {
        //print_r($upload_data);exit;
        $this->load->helper('url');
        $data = array(
            'player_id' => $upload_data['player_id'],
            'media_value' => $this->input->post('playervideo'),
            'video_thumbnail' => $upload_data['upload_data']['file_name'],
            'video_title' => $this->input->post('videotitle'),
            'type' => 'video'
            //'slug' => $slug,
            //'text' => $this->input->post('text')
        );

        //print_r($data);exit;
        return $this->db->insert('garvhai_players_media', $data);
    }

    public function get_player_videos($player_id)
    {
        $query = $this->db->get_where('garvhai_players_media', array('player_id' => $player_id, 'type' => 'video'));
        $data['videos'] = $query->result_array();

        return $data;
    }

    public function addsocial($player_id)
    {
        $this->load->helper('url');
        $data = array(
            'player_id' => $player_id,
            'media_value' => $this->input->post('newstitle'),
            'link' => $this->input->post('newslink'),
            'description' => $this->input->post('newsdesc'),
            'published_date' => date('Y-m-d', strtotime($this->input->post('newsdate'))),
            'type' => 'social'
            //'slug' => $slug,
            //'text' => $this->input->post('text')
        );
        //print_r($data); exit();
        return $this->db->insert('garvhai_players_media', $data);
    }

    public function get_player_social($player_id)
    {

        $query = $this->db->get_where('garvhai_players_media', array('player_id' => $player_id, 'type' => 'social'));
        $data['social'] = $query->result_array();

        return $data;
    }

    public function get_contact_us_user_data() {
        
        $query = $this->db->query('SELECT * FROM garvhai_users');
        return $query->result_array();
    }

    public function deleteuser($user_id)
    {
        return $this->db->delete('garvhai_users', array('id' => $user_id)); 
    }

}