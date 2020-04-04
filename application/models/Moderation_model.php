<?php
class Moderation_model extends CI_Model 
{
    public function moderator_exists ($username)
    {
        $query = $this->db->get_where('moderators', ['username' => $username]);
		return $query->num_rows() == 1;
    }

    public function get_moderator_data ($username)
    {
        $query = $this->db->get_where('moderators', ['username' => $username]);
        return $query->row_array();
    }
}