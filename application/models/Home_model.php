<?php
class Home_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_player_data()
	{
        $query = $this->db->query('SELECT * FROM garvhai_players order by name asc LIMIT 8');
        return $query->result_array();
	}
    public function get_player_video()
    {
        $query = $this->db->query('SELECT gm.*,gp.name,gp.profile_photo,gp.olympic_qulified FROM garvhai_players_media gm INNER JOIN garvhai_players gp ON gp.id = gm.player_id WHERE gm.player_id = 4 AND gm.type <> "social" ORDER BY gm.id DESC LIMIT 8');
        return $query->result_array();
    }
    

    public function get_player_modal_data($mode = '',$player_id = '')
    {
        if($player_id =='all'){
            $mode = 'allmedia';
        }
        if ($mode == 'profile') {
            $query = $this->db->get_where('garvhai_players', array('id' => $player_id));
        }else if($mode == 'videos'){
            $query = $this->db->query('SELECT gm.*,gp.name,gp.profile_photo,gp.olympic_qulified FROM garvhai_players_media gm INNER JOIN garvhai_players gp ON gp.id = gm.player_id WHERE gm.player_id = '.$player_id.' AND gm.type <> "social" ORDER BY gm.id DESC LIMIT 8');
        }else if($mode == 'allmedia'){
            $query = $this->db->query('SELECT gm.*,gp.name,gp.profile_photo,gp.olympic_qulified FROM garvhai_players_media gm INNER JOIN garvhai_players gp ON gp.id = gm.player_id WHERE gm.type = "social" ORDER BY gm.published_date DESC');
        }else if($mode == 'media'){
            $query = $this->db->query('SELECT gm.*,gp.name,gp.profile_photo,gp.olympic_qulified FROM garvhai_players_media gm INNER JOIN garvhai_players gp ON gp.id = gm.player_id WHERE gm.player_id = '.$player_id.' AND gm.type = "social" ORDER BY gm.published_date DESC');
            //$this->db->get_where('garvhai_players_media', array('player_id' => $player_id,'type' => 'social'));
        }
        //echo $this->db->last_query(); exit();
        return $query->result_array();
    }

     public function get_player_filter_data($player_id = '')
    {
        //$query = $this->db->get_where('garvhai_players_media', array('player_id' => $player_id), 8, 0);
        $query = $this->db->query('SELECT gm.*,gp.name,gp.profile_photo,gp.olympic_qulified FROM garvhai_players_media gm INNER JOIN garvhai_players gp ON gp.id = gm.player_id WHERE gm.player_id = '.$player_id.' AND gm.type <> "social" ORDER BY gm.id DESC LIMIT 8');
        //echo $this->db->last_query(); exit();
        return $query->result_array();
    }

    public function user_share_data($upload_data)
    {
        $this->load->helper('url');
        $data = array(
            'user_name' => $this->db->escape($upload_data['name']),
            'email' => $this->db->escape($upload_data['email']),
            'mobile' => $upload_data['mobile'],
            'comment' => $this->db->escape($upload_data['cmnt'])
        );

         $sql = $this->db->insert_string('garvhai_users', $data);
         return $this->db->query($sql);
    }
}