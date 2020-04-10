<?php
class News_model extends CI_Model 
{
    function get_latest_news()
    {
        $query = $this->db->select('news.id, news.title AS news_title, news_categories.category AS news_category, news.content AS news_content, '
            . 'levels.level AS news_level, faculties.faculty AS news_faculty, departments.department AS news_department')
            ->from('news')
            ->join('news_categories', 'news_categories.id = news.category_id')
            ->join('levels', 'levels.id = news.level_id')
            ->join('faculties', 'faculties.id = news.faculty_id')
            ->join('departments', 'departments.id = news.department_id')
            ->order_by('news.date_added DESC')
            ->limit(10, 0);

        return $query->get()->result_array();
    }

    function get_news_categories_ids()
    {
        return $this->db->select('id')->from('news_categories')
            ->get()->result_array();
    }

    function get_news_catgory_title ($news_category_id)
    {
        $query = $this->db->select('category')
            ->get_where('news_categories', ['id' => $news_category_id]);

        if ($query->row_array())
            return $query->row_array()['category'];
        else
            return FALSE;
    }

    function get_news_for_category ($news_category_id, $restrictions)
    {
        $restrictions['news.category_id'] = $news_category_id;

        $query = $this->db->select('news.content')
            ->from('news')
            ->where($restrictions);

        return $query->get()->result_array();
    }

    function get_restricted_latest_news ($restrictions)
    {
        $query = $this->db->select('news.id, news.title AS news_title, news.date_added')
            ->from('news')
            ->where($restrictions)
            ->order_by('news.date_added DESC')
            ->limit(10, 0);;
            
        return $query->get()->result_array();
    }

    public function get_news ($restrictions)
    {
        $query = $this->db->select('id')
            ->from('news')
            ->where($restrictions);

        return $query->get()->result_array();
    }

    public function get_limited_news ($items_per_page, $items_offset, $restrictions)
    {
        $query = $this->db->select('news.id, news.title AS news_title, '
            . 'news.content AS news_content, news.date_added AS news_date')
            ->from('news')
            ->where($restrictions)
            ->order_by('news.date_added DESC')
            ->limit($items_per_page, $items_offset);

        return $query->get()->result_array();
    }

    function get_category_comments ($comments_restrictions)
    {
        $query = $this->db->select('author, date_added AS date, comment')
            ->from('news_category_comments')
            ->where($comments_restrictions)
            ->order_by('date_added ASC');
            
        return $query->get()->result_array();
    }

    function add_category_comment ($entries)
    {
        $this->db->insert('news_category_comments', $entries);
        
        return $this->db->insert_id();
    }

    function get_category_comment ($id)
    {
        return $this->db->select('author, date_added AS date, comment')
            ->get_where('news_category_comments', ['id' => $id])
            ->row_array();
    }

    function get_news_item ($news_id)
    {
        $query = $this->db->select('news.id, news.title AS news_title, news_categories.category AS news_category, '
            . 'departments.department AS news_department, news.content AS news_content, '
            . 'news.date_added AS news_date')
            ->from('news')
            ->join('news_categories', 'news_categories.id = news.category_id')
            ->join('departments', 'departments.id = news.department_id')
            ->where(['news.id' => $news_id]);

        return $query->get()->row_array();
    }

    function get_news_item_comments ($comments_restrictions)
    {
        $query = $this->db->select('author, date_added AS date, comment')
            ->from('news_comments')
            ->where($comments_restrictions)
            ->order_by('date_added ASC');
            
        return $query->get()->result_array();
    }

    function add_news_comment ($entries)
    {
        $this->db->insert('news_comments', $entries);
        
        return $this->db->insert_id();
    }

    function get_news_comment ($id)
    {
        return $this->db->select('author, date_added AS date, comment')
            ->get_where('news_comments', ['id' => $id])
            ->row_array();
    }

    public function get_searched_news ($keyword, $restrictions)
    {
        $query = $this->db->select('id')
            ->from('news')
            ->where($restrictions)
            ->like('news.title', $keyword);

        return $query->get()->result_array();
    }

    public function get_limited_searched_news ($keyword, $items_per_page, $items_offset, $restrictions)
    {
        $query = $this->db->select('news.id, news.title AS news_title, '
            . 'news.content AS news_content, news.date_added AS news_date')
            ->from('news')
            ->where($restrictions)
            ->like('news.title', $keyword)
            ->order_by('news.date_added DESC')
            ->limit($items_per_page, $items_offset);

        return $query->get()->result_array();
    }

    function subscription_exists ($restrictions)
    {
        $query = $this->db->select('id')
            ->from('news_subscriptions')
            ->where($restrictions);

        return $query->get()->row_array();
    }

    function add_subscription ($entries)
    {
        $this->db->insert('news_subscriptions', $entries);
    }
}