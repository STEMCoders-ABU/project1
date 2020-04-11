<?php
class Moderation_model extends CI_Model 
{
    public function moderator_exists ($username)
    {
        $query = $this->db->get_where('moderators', ['username' => $username]);
		return $query->num_rows() == 1;
    }

    public function admin_exists ($username)
    {
        $query = $this->db->get_where('administrators', ['username' => $username]);
		return $query->num_rows() == 1;
    }

    public function get_moderator_data ($username)
    {
        $query = $this->db->get_where('moderators', ['username' => $username]);
        return $query->row_array();
    }

    public function get_admin_data ($username)
    {
        $query = $this->db->get_where('administrators', ['username' => $username]);
        return $query->row_array();
    }

    public function get_levels()
    {
        return $this->db->get('levels')->result_array();
    }

    public function get_faculties()
    {
        return $this->db->get('faculties')->result_array();
    }

    public function get_faculty_departments ($faculty_id)
    {
        return $this->db->get_where('departments', ['faculty_id' => $faculty_id])
            ->result_array();
    }
    
    public function get_courses ($department_id, $level_id)
    {
        return $this->db->get_where('courses', ['department_id' => $department_id, 'level_id' => $level_id])
            ->result_array();
    }

    public function get_resource_categories()
    {
        return $this->db->get('resource_categories')->result_array();
    }

    public function get_news_categories()
    {
        return $this->db->get('news_categories')->result_array();
    }

    public function add_course ($entries)
    {
        $this->add_entries('courses', $entries);
    }

    public function add_resource ($entries)
    {
        $this->add_entries('resources', $entries);
    }

    public function add_news ($entries)
    {
        $this->add_entries('news', $entries);
    }

    public function add_entries ($table, $entries)
    {
        $this->db->insert($table, $entries);
    }

    public function get_resources ($category_id, $course_id)
    {
        $condtions = ['department_id' => $this->session->userdata('department_id'),
            'level_id' => $this->session->userdata('level_id')];

        if ($category_id != 0)
            $condtions['category_id'] = $category_id;
            
        if ($course_id != 0)
            $condtions['course_id'] = $course_id;
            
        return $this->db->select('id')
            ->get_where('resources', $condtions)
            ->result_array();
    }

    public function get_limited_resources ($category_id, $course_id, $items_per_page, $items_offset)
    {
        $condtions = ['resources.department_id' => $this->session->userdata('department_id'),
            'resources.level_id' => $this->session->userdata('level_id')];

        if ($category_id != 0)
            $condtions['category_id'] = $category_id;
            
        if ($course_id != 0)
            $condtions['course_id'] = $course_id;

        $query = $this->db->select('resources.id, resources.title AS resource_title, resource_categories.category AS resource_category, '
            . 'levels.level AS resource_level, courses.course_code AS resource_course')
            ->from('resources')
            ->join('resource_categories', 'resource_categories.id = resources.category_id')
            ->join('levels', 'levels.id = resources.level_id')
            ->join('courses', 'courses.id = resources.course_id')
            ->where($condtions)
            ->order_by('resources.date_added DESC')
            ->limit($items_per_page, $items_offset);

        return $query->get()->result_array();
    }

    public function get_resource ($resource_id)
    {
        return $this->db->get_where('resources', ['id' => $resource_id])
            ->row_array();    
    }

    public function update_resource ($resource_id, $entries)
    {
        $this->db->where(['id' => $resource_id])
            ->update('resources', $entries);
    }

    public function remove_resource ($resource_id)
    {
        $this->db->where(['id' => $resource_id])
            ->delete('resources');
    }

    public function get_news_items ($category_id)
    {
        $condtions = ['department_id' => $this->session->userdata('department_id'),
            'level_id' => $this->session->userdata('level_id')];

        if ($category_id != 0)
            $condtions['category_id'] = $category_id;
            
        return $this->db->select('id')
            ->get_where('news', $condtions)
            ->result_array();
    }

    public function get_limited_news_items ($category_id, $items_per_page, $items_offset)
    {
        $condtions = ['news.department_id' => $this->session->userdata('department_id'),
            'news.level_id' => $this->session->userdata('level_id')];

        if ($category_id != 0)
            $condtions['category_id'] = $category_id;
            
        $query = $this->db->select('news.id, news.title AS news_title, news_categories.category AS news_category, '
            . 'levels.level AS news_level, departments.department AS news_department')
            ->from('news')
            ->join('news_categories', 'news_categories.id = news.category_id')
            ->join('levels', 'levels.id = news.level_id')
            ->join('departments', 'departments.id = news.department_id')
            ->where($condtions)
            ->order_by('news.date_added DESC')
            ->limit($items_per_page, $items_offset);

        return $query->get()->result_array();
    }

    public function get_news_item ($news_id)
    {
        return $this->db->get_where('news', ['id' => $news_id])
            ->row_array();    
    }

    public function update_news_item ($news_id, $entries)
    {
        $this->db->where(['id' => $news_id])
            ->update('news', $entries);
    }

    public function remove_news_item ($news_id)
    {
        $this->db->where(['id' => $news_id])
            ->delete('news');
    }

    public function moderator_email_exists ($email)
	{
		$query = $this->db->get_where('moderators', ['email' => $email]);
		return $query->num_rows() == 1;
	}

	public function insert_verification_data ($email, $verification_code)
	{
		$data =
		[
			'email' => $email,
			'verification_code' => $verification_code,
		];
		
		$this->db->insert('password_resets', $data);
	}

	public function requested_password_reset ($email)
	{
		$query = $this->db->get_where('password_resets', ['email' => $email]);
		return $query->num_rows() == 1;
	}

	public function get_verification_data ($email)
	{
		$query = $this->db->get_where('password_resets', ['email' => $email]);
		return $query->row_array();
	}

	public function get_verification_data_via_id ($id)
	{
		$query = $this->db->get_where('password_resets', ['id' => $id]);
		return $query->row_array();
	}

	public function get_verification_data_via_code ($verification_code)
	{
		$query = $this->db->get_where('password_resets', ['verification_code' => $verification_code]);
		return $query->row_array();
	}

	public function remove_verification_data ($email)
	{
		$this->db->where(['email' => $email])
			->delete('password_resets');
    }
    
    public function update_moderator ($email, array $new_data)
	{
		$query = $this->db->where('email', $email)
			->update('moderators', $new_data);
		return $query;
    }

    public function add_faculty ($faculty)
    {
        $this->db->insert('faculties', ['faculty' => $faculty]);
    }

    public function update_faculty ($id, $faculty)
	{
		$this->db->where('id', $id)
			->update('faculties', ['faculty' => $faculty]);
    }

    public function remove_faculty ($id)
    {
        $this->db->where(['id' => $id])
			->delete('faculties');
    }

    public function add_department ($department, $f_id)
	{
		$this->db->insert('departments', ['department' => $department, 'faculty_id' => $f_id]);
    }

    public function update_department ($d_id, $department, $f_id)
	{
        $this->db->where('faculty_id', $f_id)
            ->where('id', $d_id)
			->update('departments', ['department' => $department]);
    }

    public function add_moderator($entries)
    {
        $this->db->insert('moderators', $entries);
    }

    public function is_moderator_unique($department_id)
    {
        $query = $this->db->get_where('moderators', ['department_id' => $department_id]);
        return $query->num_rows() == 1;
    }
}