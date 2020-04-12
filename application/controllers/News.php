<?php
class News extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('news_model');
    }

    public function index()
    {
        $data['page_title'] = 'News';
        $data['news'] = $this->news_model->get_latest_news();
        load_view('news/index', $data);
    }

    public function news ($faculty_id = 0, $department_id = 0, $level_id = 0, $category_id = 0, $items_offset = 0)
    {
        $data['page_title'] = 'News';

        if ($faculty_id == 0 && $department_id == 0 && $level_id == 0)
            redirect('news');

        $news_categories_ids = $this->news_model->get_news_categories_ids();
        $sidebar_contents = [];

        $restrictions = 
        [
            'news.faculty_id' => $faculty_id,
            'news.department_id' => $department_id,
            'news.level_id' => $level_id,
        ];

        $first_category_with_news_id = NULL;
        
        foreach ($news_categories_ids as $news_category_id)
        {
            $group['category_id'] = $news_category_id['id'];
            $group['header'] = $this->news_model->get_news_catgory_title($news_category_id['id']) . 's';
            $group['contents'] = $this->news_model->get_news_for_category($news_category_id['id'], $restrictions);
            $sidebar_contents[] = $group;

            if ($first_category_with_news_id == NULL && $group['contents'])
            {
                $first_category_with_news_id = $group['category_id'];
            }
        }

        if ($category_id == 0)
            $category_id = $first_category_with_news_id;

        $category = $this->news_model->get_news_catgory_title($category_id);
        if (! $category)
        {
            $data['error'] = TRUE;
            load_view('news/news', $data);
        }

        $restrictions['news.category_id'] = $category_id;

        $comments_restrictions = 
        [
            'department_id' => $department_id,
            'level_id' => $level_id,
            'category_id' => $category_id,
        ];

        $latest_news = $this->news_model->get_restricted_latest_news($restrictions);

        $items_per_page = 10;
        $total_items = count($this->news_model->get_news($restrictions));

        $this->load->library('pagination');

        $pagination_config = get_pagination_config(base_url('news/news/' . $faculty_id . '/' . $department_id 
            . '/' . $level_id . '/' . $category_id), $total_items, $items_per_page);
        
        $this->pagination->initialize($pagination_config);

        $data['faculty_id'] = $faculty_id;
        $data['department_id'] = $department_id;
        $data['level_id'] = $level_id;
        $data['category_id'] = $category_id;
        $data['sidebar_contents'] = $sidebar_contents;
        $data['category'] = $category;
        $data['news'] = $this->news_model->get_limited_news($items_per_page, $items_offset, $restrictions);
        $data['latest_news'] = $latest_news;
        $data['pagination'] = $this->pagination->create_links();
        $data['category_comments'] = $this->news_model->get_category_comments($comments_restrictions);

        load_view('news/news', $data);
    }

    function add_category_comment()
    {
        $department_id = get_post('department_id');
        $level_id = get_post('level_id');
        $category_id = get_post('category_id');
        $author = get_post('author');
        $comment = get_post('comment');

        $entries = 
        [
            'category_id' => $category_id,
            'department_id' => $department_id,
            'level_id' => $level_id,
            'author' => $author,
            'comment' => $comment,
        ];

        $id = $this->news_model->add_category_comment($entries);

        $comment_data = $this->news_model->get_category_comment($id);
        echo generate_comment_markup($comment_data);
    }

    function view ($news_id)
    {
        $data['page_title'] = 'News';

        $comments_restrictions = 
        [
            'news_id' => $news_id,
        ];

        $data['news_item'] = $this->news_model->get_news_item($news_id);
        $data['comments'] = $this->news_model->get_news_item_comments($comments_restrictions);

        load_view('news/view', $data);
    }

    function add_news_comment()
    {
        $news_id = get_post('news_id');
        $author = get_post('author');
        $comment = get_post('comment');
        
        $entries = 
        [
            'news_id' => $news_id,
            'author' => $author,
            'comment' => $comment,
        ];

        $id = $this->news_model->add_news_comment($entries);

        $comment_data = $this->news_model->get_news_comment($id);
        echo generate_comment_markup($comment_data);
    }

    function search ($faculty_id = 0, $department_id = 0, $level_id = 0, $category_id = 0,
        $keyword = '', $items_offset = 0)
    {
        $data['page_title'] = 'News';

        if ($faculty_id == 0 && $department_id == 0 && $level_id == 0)
            redirect('news');

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $keyword = get_post('keyword');
            $category_id = get_post('category');
        }

        $restrictions = 
        [
            'news.faculty_id' => $faculty_id,
            'news.department_id' => $department_id,
            'news.level_id' => $level_id,
            'news.category_id' => $category_id,
        ];

        $category = $this->news_model->get_news_catgory_title($category_id);
        if (! $category)
        {
            $data['error'] = TRUE;
            load_view('news/search', $data);
        }

        $items_per_page = 10;
        $total_items = count($this->news_model->get_searched_news($keyword, $restrictions));

        $this->load->library('pagination');

        $pagination_config = get_pagination_config(base_url('news/search/' . $faculty_id . '/' . $department_id 
            . '/' . $level_id . '/' . $category_id . '/' . $keyword), $total_items, $items_per_page);
        
        $this->pagination->initialize($pagination_config);

        $data['faculty_id'] = $faculty_id;
        $data['department_id'] = $department_id;
        $data['level_id'] = $level_id;
        $data['category_id'] = $category_id;
        $data['category'] = $category;
        $data['news'] = $this->news_model->get_limited_searched_news($keyword, $items_per_page, $items_offset, $restrictions);
        $data['pagination'] = $this->pagination->create_links();
        
        load_view('news/search', $data);
    }
}